import './bootstrap';

import justifiedLayout from 'justified-layout';

window.justifyGallery = function (images, containerSelector) {
    const container = document.querySelector(containerSelector);
    const boxes = container.querySelectorAll('.gallery-box');
    const containerWidth = container.getBoundingClientRect().width;


    const layout = justifiedLayout(
        images.map(img => ({
            width: img.naturalWidth || 4,  // fallback in case image isn't loaded yet
            height: img.naturalHeight || 3
        })), {
            containerWidth: containerWidth,
            boxSpacing: 10,
            targetRowHeight: 200,
        }
    );

    layout.boxes.forEach((box, index) => {
        const el = boxes[index];
        el.style.position = 'absolute';
        el.style.top = `${box.top}px`;
        el.style.left = `${box.left}px`;
        el.style.width = `${box.width}px`;
        el.style.height = `${box.height}px`;
    });

    container.style.position = 'relative';
    container.style.height = `${layout.containerHeight}px`;
};

