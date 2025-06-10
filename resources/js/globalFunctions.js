import { useToast } from 'vue-toastification';
import { h } from 'vue';

const toast = useToast();

const notify = (Message, Type) => {
    toast(h('div', { innerHTML: Message }), {
        type: Type,
        position: "top-right",
        timeout: 2000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        hideProgressBar: true,
        closeButton: "button",
        icon: true,
        rtl: false
    });
}

const notify2 = (Message, Type) => {
    toast(h('div', { innerHTML: Message }), {
        type: Type,
        position: "top-right",
        timeout: 4000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        hideProgressBar: true,
        closeButton: "button",
        icon: true,
        rtl: false
    });
}

// New custom styled toast with enhanced styling
const notifyCustom = (Message, Type) => {
    const customContent = h('div', {
        style: {
            display: 'flex',
            alignItems: 'center',
            gap: '12px',
            padding: '8px 4px',
            fontWeight: '500',
            fontSize: '14px',
            fontFamily: 'Inter, system-ui, -apple-system, sans-serif'
        }
    }, [
        // Custom icon based on type
        h('div', {
            style: {
                width: '24px',
                height: '24px',
                borderRadius: '50%',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                fontSize: '12px',
                fontWeight: 'bold',
                color: 'white',
                backgroundColor: Type === 'success' ? '#22c55e' : Type === 'error' ? '#ef4444' : '#3b82f6',
                flexShrink: 0
            }
        }, Type === 'success' ? '✓' : Type === 'error' ? '✕' : 'i'),
        // Message content
        h('div', {
            innerHTML: Message,
            style: {
                flex: 1,
                lineHeight: '1.4'
            }
        })
    ]);

    toast(customContent, {
        type: Type,
        position: "top-center",
        timeout: 3500,
        closeOnClick: true,
        pauseOnFocusLoss: false,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.7,
        showCloseButtonOnHover: true,
        hideProgressBar: false,
        closeButton: false,
        icon: false,
        rtl: false,
        toastClassName: 'custom-toast',
        bodyClassName: 'custom-toast-body',
        // Custom styling for different types
        toastStyle: {
            background: Type === 'success' 
                ? 'linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%)' 
                : Type === 'error' 
                ? 'linear-gradient(135deg, #fef2f2 0%, #fef1f1 100%)' 
                : 'linear-gradient(135deg, #eff6ff 0%, #f0f9ff 100%)',
            border: Type === 'success' 
                ? '1px solid #bbf7d0' 
                : Type === 'error' 
                ? '1px solid #fecaca' 
                : '1px solid #bfdbfe',
            borderRadius: '12px',
            boxShadow: '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
            color: Type === 'success' 
                ? '#166534' 
                : Type === 'error' 
                ? '#991b1b' 
                : '#1e40af',
            minHeight: '60px',
            padding: '16px 20px'
        }
    });
}

// Minimalist toast with slide animation effect
const notifyMinimal = (Message, Type) => {
    const minimalContent = h('div', {
        style: {
            display: 'flex',
            alignItems: 'center',
            gap: '14px',
            fontSize: '14px',
            fontWeight: '400',
            fontFamily: 'system-ui, -apple-system, sans-serif'
        }
    }, [
        // Circular icon with checkmark or X
        h('div', {
            style: {
                width: '28px',
                height: '28px',
                borderRadius: '50%',
                backgroundColor: Type === 'success' ? '#4ade80' : Type === 'error' ? '#ef4444' : '#6366f1',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                color: 'white',
                fontSize: '14px',
                fontWeight: 'bold',
                flexShrink: 0
            }
        }, Type === 'success' ? '✓' : Type === 'error' ? '✕' : 'i'),
        // Content section
        h('div', {
            style: {
                flex: 1,
                display: 'flex',
                flexDirection: 'column',
                gap: '2px'
            }
        }, [
            // Title
            h('div', {
                style: {
                    fontSize: '14px',
                    fontWeight: '600',
                    color: 'white',
                    textTransform: 'uppercase',
                    letterSpacing: '0.05em'
                }
            }, Type === 'success' ? 'SUCCESS!' : Type === 'error' ? 'ERROR!' : 'INFO!'),
            // Message
            h('div', {
                innerHTML: Message,
                style: {
                    fontSize: '13px',
                    color: 'white',
                    lineHeight: '1.4',
                    opacity: '0.85'
                }
            })
        ]),
        // Close button
        h('div', {
            style: {
                width: '20px',
                height: '20px',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                color: 'white',
                cursor: 'pointer',
                fontSize: '16px',
                opacity: '0.6',
                flexShrink: 0
            },
            onClick: () => toast.clear()
        }, '✕')
    ]);

    toast(minimalContent, {
        type: Type,
        position: "top-right",
        timeout: 3000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.8,
        showCloseButtonOnHover: false,
        hideProgressBar: true,
        closeButton: false,
        icon: false,
        rtl: false,
        transition: "Vue-Toastification__slideBlurred",
        toastStyle: {
            background: '#ffffff',
            border: '1px solid #e5e7eb',
            borderRadius: '6px',
            boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            minHeight: '60px',
            padding: '16px 18px'
        }
    });
}

// Function to convert image to base64
const imageToBase64 = (imagePath) => {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.crossOrigin = 'anonymous'; // Handle CORS if needed
        
        img.onload = () => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            
            // Set canvas dimensions to match image
            canvas.width = img.width;
            canvas.height = img.height;
            
            // Draw image on canvas
            ctx.drawImage(img, 0, 0);
            
            // Convert to base64
            const base64 = canvas.toDataURL('image/png');
            resolve(base64);
        };
        
        img.onerror = (error) => {
            reject(new Error(`Failed to load image: ${error}`));
        };
        
        img.src = imagePath;
    });
};

// Function specifically for your logo
const getLogoBase64 = async () => {
    try {
        const base64Logo = await imageToBase64('/logo1.png');
        return base64Logo;
    } catch (error) {
        console.error('Error converting logo to base64:', error);
        return null;
    }
};

// Cache for storing converted images to avoid repeated conversions
const imageCache = new Map();

// Enhanced function with caching
const getImageBase64 = async (imagePath) => {
    // Check if image is already cached
    if (imageCache.has(imagePath)) {
        return imageCache.get(imagePath);
    }
    
    try {
        const base64Image = await imageToBase64(imagePath);
        // Cache the result
        imageCache.set(imagePath, base64Image);
        return base64Image;
    } catch (error) {
        console.error(`Error converting image ${imagePath} to base64:`, error);
        return null;
    }
};

const globalFunctions = {
    install(app) {
        app.config.globalProperties.notify = notify;
        app.config.globalProperties.notify2 = notify2;
        app.config.globalProperties.notifyCustom = notifyCustom;
        app.config.globalProperties.notifyMinimal = notifyMinimal;
        app.config.globalProperties.imageToBase64 = imageToBase64;
        app.config.globalProperties.getLogoBase64 = getLogoBase64;
        app.config.globalProperties.getImageBase64 = getImageBase64;
    }
};

export { notify, notify2, notifyCustom, notifyMinimal, imageToBase64, getLogoBase64, getImageBase64 };
export default globalFunctions;