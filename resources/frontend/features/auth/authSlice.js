import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';

const initialState = {
  user: null,
  token: localStorage.getItem('token') || null,
  loading: false,
  error: null,
};

export const login = createAsyncThunk(
  'auth/login',
  async (credentials, { rejectWithValue }) => {
    try {
      const response = await axios.post('/api/user/login', credentials, {
        withCredentials: true,
      });

      localStorage.setItem('token', response.data.token);
      localStorage.setItem('user_id', response.data.user.id);
      return response.data
    } catch (error) {
      return rejectWithValue(error.response.data);
    }
  }
);

export const register = createAsyncThunk(
  'auth/register',
  async (credentials, { rejectWithValue }) => {
    try {
      const response = await axios.post('/api/user/register', {
        name: credentials.name,
        email: credentials.email,
        password: credentials.password,
        password_confirmation: credentials.passwordConfirmation,
        recaptcha: credentials.recaptcha
      }, {
        withCredentials: true,
      });

      return response.data
    } catch (error) {
      return rejectWithValue(error.response.data);
    }
  }
);

export const updateProfile = createAsyncThunk(
  'auth/update',
  async (credentials, { rejectWithValue }) => {

    const formData = new FormData();

    if (credentials.image) {
      formData.append("avatar", credentials.image);
    }
    formData.append("name", credentials.name);
    formData.append("address", credentials.address);
    formData.append("phone_number", credentials.phone);
    formData.append("level_id", credentials.level);
    formData.append("national_id", credentials.nationality);

    try {
      const response = await axios.post('/api/user/update', formData, {
        withCredentials: true,
      });

      return response.data
    } catch (error) {
      return rejectWithValue(error.response.data);
    }
  }
);

export const logout = createAsyncThunk('auth/logout', async () => {
  await axios.post('/api/user/logout', {}, { withCredentials: true });
  localStorage.removeItem('token'); // Clear token
  localStorage.removeItem('user_id'); // Clear token
});

const authSlice = createSlice({
  name: 'auth',
  initialState,
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(login.pending, (state) => {
        state.loading = true;
      })
      .addCase(login.fulfilled, (state, action) => {
        state.loading = false;
        state.user = action.payload.user;
        state.token = action.payload.token;
        state.error = null;
      })
      .addCase(login.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(logout.fulfilled, (state) => {
        state.user = null;
        state.token = null;
      });
  },
});

export default authSlice.reducer;
