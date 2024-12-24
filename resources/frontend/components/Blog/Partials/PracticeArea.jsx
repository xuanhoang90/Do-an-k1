import React, { useEffect, useRef, useState } from "react";
import { Link } from "react-router-dom";
import { postData } from "../../../utils/api";

export default function PracticeArea ({closeModal, lesson}) {
    const canvasRef  = useRef(null)
    const [isDrawing, setIsDrawing] = useState(false);
    const [lastPosition, setLastPosition] = useState({ x: 0, y: 0 });
    const [sampleImage, setSampleImage] = useState('');
    const [penColor, setPenColor] = useState('#ff0000');
    const [penSize, setPenSize] = useState(5);
    const [lastTime, setLastTime] = useState(0);
    const [lastLineWidth, setLastLineWidth] = useState(1);

    const colors = [
        '#000000',
        '#ff0000',
        '#00ff00',
        '#0000ff',
        '#ffff00',
        '#00ffff',
        '#ff00ff',
    ]

    const sizes = [
        3, 5, 7, 10, 12
    ]

    useEffect(() => {
        setSampleImage(lesson.lesson_samples[0].thumbnail)
        setPenSize(sizes[0])
        setPenColor(colors[0])
    }, [lesson]);

    useEffect(() => {
        const canvas = canvasRef.current;
        const context = canvas.getContext('2d');
        context.lineCap = 'round';
        context.lineJoin = 'round';
        context.strokeStyle = penColor; // Color for drawing
        context.lineWidth = penSize; // Set stroke width
    }, [penColor, penSize]);

    useEffect(() => {
        const canvas = canvasRef.current;
        const context = canvas.getContext('2d');

        context.clearRect(0, 0, canvas.width, canvas.height);
        const backgroundImage = new Image();
        backgroundImage.src = sampleImage; // Replace with your image URL
        backgroundImage.onload = () => {
            context.globalAlpha = 0.3;
            context.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);
        };
        context.globalAlpha = 1.0;
    }, [sampleImage]);

    const startDrawing = (e) => {
        setIsDrawing(true);
        const { offsetX, offsetY } = e.nativeEvent;
        setLastPosition({ x: offsetX, y: offsetY });
    };

    const draw = (e) => {
        if (!isDrawing) return;

        const currentTime = Date.now();
        const { offsetX, offsetY } = e.nativeEvent;
        const canvas = canvasRef.current;
        const context = canvas.getContext('2d');

        context.beginPath();
        context.moveTo(lastPosition.x, lastPosition.y);

        const timeDiff = currentTime - lastTime;
        const distance = Math.sqrt(Math.pow(offsetX - lastPosition.x, 2) + Math.pow(offsetY - lastPosition.y, 2));
        const speed = distance / timeDiff;
        let newLineWidth = Math.max(0.1, penSize / (speed + 0.2));

        context.lineWidth = lastLineWidth + (newLineWidth - lastLineWidth) * 0.2;

        context.lineTo(offsetX, offsetY);
        context.stroke();
        context.closePath();

        setLastLineWidth(context.lineWidth)
        setLastPosition({ x: offsetX, y: offsetY });
        setLastTime(currentTime)
    };

    const stopDrawing = () => {
        setIsDrawing(false);
    };

    const postCanvasImage = async () => {
        const canvas = canvasRef.current;

        canvas.toBlob(async (blob) => {
          const formData = new FormData();
          formData.append('image', blob, 'canvas-image.png');
          formData.append('lesson_id', lesson.id);
    
          let res = await postData('user/save-practice', formData)
          
          if (res.success) {
            alert('Image has been saved successfully')
            closeModal()
          }
        }, 'image/png');
    };

    return (
        <>
            <div className="container profile-page" id="pacticeAreaContainer">
                <button type="button" className="btn-close" onClick={closeModal}></button>
                <div className="row">
                    <div className="col-lg-12">
                        <h4 className="blog-details-title">Practice: { lesson?.title }</h4>
                    </div>
                </div>
                <div className="row">
                    {/* Sidebar */}
                    <div className="col-md-4">
                        <div className="widget-sidber py-3">
                            <div className="widget-category">
                                <h3 className="blog-details-title mt-3">Samples:</h3>
                                <div className="previewSamples">
                                    {
                                        lesson?.lesson_samples?.map((sample, index) => (
                                            <img key={index} className={sample.thumbnail == sampleImage ? 'selected' : ''} onClick={() => setSampleImage(sample.thumbnail)} src={sample.thumbnail} alt="Sample" />
                                        ))
                                    }
                                </div>

                                <h3 className="blog-details-title">Color:</h3>
                                <div className="colors">
                                    {
                                        colors.map((color, index) => (
                                            <div key={index} className={color == penColor ? 'color-item selected' : 'color-item'} style={{ backgroundColor: color }} onClick={() => setPenColor(color)}></div>
                                        ))
                                    }
                                </div>

                                <h3 className="blog-details-title">Size:</h3>
                                <div className="sizes">
                                    {
                                        sizes.map((size, index) => (
                                            <div key={index} className={size == penSize? 'sizes-item selected mb-3' :'sizes-item mb-3'} onClick={() => setPenSize(size)} style={{ height: `${size}px` }}></div>
                                        ))
                                    }
                                </div>
                            </div>
                        </div>

                    </div>
                    {/* Main Content */}
                    <div className="col-md-8">
                        <div className="widget-sidber">
                            
                            <canvas
                                id="practiceArea"
                                ref={canvasRef}
                                width={600}
                                height={500}
                                onMouseDown={startDrawing}
                                onMouseMove={draw}
                                onMouseUp={stopDrawing}
                                onMouseLeave={stopDrawing}
                            />

                        </div>
                    </div>
                </div>

                <div className="row">
                    <div className="col-lg-4 offset-4">
                        <div className="submit-button">
                            <button type="button" onClick={postCanvasImage}>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
