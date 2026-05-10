<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1 Makeover Certificate</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Times New Roman', serif;
            padding: 10px;
            flex-direction: column;
        }

        .certificate-wrapper {
            position: relative;
            width: 1000px;
            height: auto;
            max-width: 100%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            margin-bottom: 20px;
            background: white;
            border: 5px solid white;
            transition: transform 0.3s ease;
            transform-origin: center center;
        }
        
       .certificate-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    

    transform: rotate(6deg); /* image rotate */
}
        
        /* Text Overlay Container */
        .text-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-family: 'Times New Roman', serif;
            pointer-events: none;
        }

        /* Rotation Controls */
        .rotation-panel {
            background: white;
            padding: 15px 25px;
            border-radius: 60px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
            border: 2px solid #d4af37;
        }

        .rotate-btn {
            background: linear-gradient(135deg, #8B4513, #a0522d);
            color: white;
            border: none;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            font-size: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(139,69,19,0.3);
            font-weight: bold;
        }

        .rotate-btn:hover {
            transform: scale(1.15);
            background: linear-gradient(135deg, #d4af37, #b8860b);
            box-shadow: 0 8px 20px rgba(180,130,50,0.4);
        }

        .rotate-value {
            font-size: 24px;
            font-weight: bold;
            color: #8B4513;
            min-width: 100px;
            text-align: center;
            background: #f9f1e0;
            padding: 10px 20px;
            border-radius: 40px;
            border: 2px solid #d4af37;
            font-family: monospace;
        }

        .reset-btn {
            background: #2c3e50;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 40px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .reset-btn:hover {
            background: #34495e;
            transform: scale(1.05);
        }

        /* Student Name */
        .student-name {
            position: absolute;
            top: 47%;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #1e2b3a;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Georgia', 'Times New Roman', serif;
            text-shadow: 2px 2px 4px rgba(255,255,255,0.8);
            padding: 0 30px;
            word-wrap: break-word;
            line-height: 1.2;
            transform: rotate(0deg); /* Text rotate property */
            transition: transform 0.3s ease;
        }

        /* Completion Text */
        .completion-line {
            position: absolute;
            top: 55%;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 24px;
            color: #34495e;
            font-style: italic;
            font-family: 'Times New Roman', serif;
            transform: rotate(-1deg);
            transition: transform 0.3s ease;
        }

        /* Course Name */
        .course-name {
            position: absolute;
            top: 54.66%;
            left: 24.77%;
            
            width: 100%;
            text-align: center;
            font-size: 23px;
            font-weight: 700;
            color: #8B4513;
            text-transform: uppercase;
            font-family: 'Georgia', 'Times New Roman', serif;
            text-decoration: underline;
            text-underline-offset: 1px;
            text-decoration-color: #b39a47;
            text-decoration-thickness: 2px;
            padding: 0 30px;
            word-wrap: break-word;
            line-height: 1.2;
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        /* Skills Line */
        .skills-line {
            position: absolute;
            top: 57%;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 22px;
            color: #2c3e50;
            font-style: italic;
            font-family: 'Times New Roman', serif;
            padding: 0 40px;
            word-wrap: break-word;
            line-height: 1.3;
            transform: rotate(-1deg);
            transition: transform 0.3s ease;
        }

        /* Date Section */
        .date-section {
            position: absolute;
            bottom: 30%;
            left: 50%;
            text-align: center;
            transform: rotate(-1deg);
            transition: transform 0.3s ease;
        }

        .date-label {
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 2px;
             bottom: 70%;
            font-family: 'Times New Roman', serif;
        }

        .date-value {
            font-size: 20px;
            color: #2c3e50;
            font-weight: 600;
            border-bottom: 2px solid #6d6c6b;
            padding-bottom: 5px;
            min-width: 200px;
            font-family: 'Times New Roman', serif;
        }

        /* Certificate ID */
        .certificate-id {
            position: absolute;
            bottom: 5%;
            right: 12%;
            font-size: 14px;
            color: #666;
            font-family: 'Times New Roman', serif;
            font-weight: 500;
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        /* Download Buttons */
        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .download-btn {
            background: linear-gradient(45deg, #8B4513, #d4af37);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            transition: all 0.3s;
            font-family: 'Times New Roman', serif;
            letter-spacing: 1px;
        }

        .download-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.4);
        }

        .download-btn.secondary {
            background: linear-gradient(45deg, #2c3e50, #3498db);
        }

        /* Loading indicator */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
            flex-direction: column;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #d4af37;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Print styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .rotation-panel, .button-container, .loading {
                display: none;
            }
            .certificate-wrapper {
                box-shadow: none;
                border: none;
                transform: rotate(0deg) !important;
            }
            .student-name, .completion-line, .course-name, .skills-line, .date-section, .certificate-id {
                transform: rotate(0deg) !important;
            }
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .certificate-wrapper {
                width: 95vw;
            }
            .rotation-panel {
                padding: 10px 15px;
            }
            .rotate-btn {
                width: 45px;
                height: 45px;
                font-size: 22px;
            }
            .rotate-value {
                font-size: 20px;
                min-width: 80px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>

<!-- Loading Indicator -->
<div class="loading" id="loading">
    <div class="spinner"></div>
    <div>Generating High Quality Certificate...</div>
</div>

<!-- Rotation Control Panel -->
<div class="rotation-panel">
    <button class="rotate-btn" onclick="rotateAll(-1)" title="Left Rotate">↺</button>
    <span class="rotate-value" id="rotationAngle">0°</span>
    <button class="rotate-btn" onclick="rotateAll(1)" title="Right Rotate">↻</button>
    <button class="reset-btn" onclick="resetRotation()">⟲ RESET</button>
</div>

<!-- Certificate Container -->
<div class="certificate-wrapper" id="certificate">
    <!-- Background Image -->
    <img src="{{ asset('images/image1.png') }}" alt="Certificate Background" class="certificate-img" id="certificateImg" crossorigin="anonymous">
    
    <!-- Text Overlay -->
    <div class="text-overlay" id="textOverlay">
        
        <!-- Student Name -->
        <div class="student-name" id="studentName">{{ $student->name ?? 'JOHN DOE' }}</div>
        
        <!-- Completion Line -->
        <div class="completion-line">has successfully completed the course in</div>
        
        <!-- Course Name -->
        <div class="course-name" id="courseName">{{ $student->subcategory ?? 'ADVANCED MAKEUP ARTISTRY' }}</div>
        
        <!-- Skills Line -->
        <div class="skills-line">with excellence in A1 Makeover & Professional Beauty Techniques</div>
        
        <!-- Date Section -->
        <div class="date-section" id="dateSection">
            <div class="date-label">DATE</div>
            <div class="date-value">
                {{ $student->created_at ? $student->created_at->format('d F, Y') : date('d F, Y') }}
            </div>
        </div>
        
        <!-- Certificate ID -->
        <div class="certificate-id" id="certificateId">
            CERT NO: A1-{{ str_pad($student->id ?? rand(1000, 9999), 6, '0', STR_PAD_LEFT) }}
        </div>
        
    </div>
</div>

<!-- Download Buttons -->
<div class="button-container">
    <button class="download-btn" onclick="downloadWithRotation('PNG')">📸 DOWNLOAD PNG</button>
    <button class="download-btn secondary" onclick="downloadWithRotation('PDF')">📥 DOWNLOAD PDF</button>
</div>

<script>
let currentRotation = 0;

// Function to rotate all elements
function rotateAll(direction) {
    currentRotation += direction;
    updateRotation();
}

function resetRotation() {
    currentRotation = 0;
    updateRotation();
}

function updateRotation() {
    // Update rotation display
    document.getElementById('rotationAngle').textContent = currentRotation + '°';
    
    // Rotate the entire certificate wrapper
    const wrapper = document.getElementById('certificate');
    wrapper.style.transform = `rotate(${currentRotation}deg)`;
    
    // Counter-rotate text to keep them straight (optional - comment out if you want text to rotate with image)
    // const textElements = document.querySelectorAll('.student-name, .completion-line, .course-name, .skills-line, .date-section, .certificate-id');
    // textElements.forEach(el => {
    //     el.style.transform = `rotate(${-currentRotation}deg)`;
    // });
}

// Function to show/hide loading
function setLoading(show) {
    document.getElementById('loading').style.display = show ? 'flex' : 'none';
}

// Function to download with rotation
async function downloadWithRotation(format) {
    try {
        setLoading(true);
        
        const certificate = document.getElementById('certificate');
        const img = document.getElementById('certificateImg');
        
        // Get dimensions
        const imgWidth = img.naturalWidth || 1000;
        const imgHeight = img.naturalHeight || 707;
        
        // Capture the certificate with current rotation
        const canvas = await html2canvas(certificate, {
            scale: 3,
            logging: false,
            allowTaint: true,
            useCORS: true,
            backgroundColor: '#ffffff',
            imageTimeout: 0,
            width: imgWidth,
            height: imgHeight,
            windowWidth: imgWidth,
            windowHeight: imgHeight
        });
        
        if (format === 'PNG') {
            // Download as PNG
            const image = canvas.toDataURL('image/png', 1.0);
            const link = document.createElement('a');
            link.download = `certificate_rotated_${currentRotation}deg_${Date.now()}.png`;
            link.href = image;
            link.click();
        } else {
            // Download as PDF
            const imgData = canvas.toDataURL('image/png', 1.0);
            const { jsPDF } = window.jspdf;
            
            // Calculate PDF dimensions
            const imgWidthMM = 280;
            const imgHeightMM = (canvas.height * imgWidthMM) / canvas.width;
            
            const pdf = new jsPDF({
                orientation: imgHeightMM > imgWidthMM ? 'portrait' : 'landscape',
                unit: 'mm',
                format: [imgWidthMM, imgHeightMM]
            });
            
            pdf.addImage(imgData, 'PNG', 0, 0, imgWidthMM, imgHeightMM, undefined, 'FAST');
            pdf.save(`certificate_rotated_${currentRotation}deg_${Date.now()}.pdf`);
        }
        
        setLoading(false);
    } catch (error) {
        console.error('Error:', error);
        alert('Error generating file. Please try again.');
        setLoading(false);
    }
}

// Keyboard shortcuts for rotation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft' || e.key === 'Left') {
        rotateAll(-1);
    } else if (e.key === 'ArrowRight' || e.key === 'Right') {
        rotateAll(1);
    } else if (e.key === 'r' || e.key === 'R') {
        resetRotation();
    }
});

// Touch support for mobile
let touchStartX = 0;
document.addEventListener('touchstart', function(e) {
    touchStartX = e.touches[0].clientX;
});

document.addEventListener('touchend', function(e) {
    if (!touchStartX) return;
    
    const touchEndX = e.changedTouches[0].clientX;
    const diff = touchEndX - touchStartX;
    
    if (Math.abs(diff) > 50) { // Swipe threshold
        if (diff > 0) {
            rotateAll(1); // Right swipe = right rotate
        } else {
            rotateAll(-1); // Left swipe = left rotate
        }
    }
});

// Handle image loading
document.addEventListener('DOMContentLoaded', function() {
    const img = document.getElementById('certificateImg');
    if (img) {
        img.crossOrigin = 'anonymous';
        img.onload = function() {
            console.log('Image loaded successfully');
        };
        img.onerror = function() {
            console.error('Error loading image');
        };
    }
});
</script>

</body>
</html>