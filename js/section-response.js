const sections = document.querySelectorAll('section');
const marker = document.querySelector('.marker');

const options = {
    threshold:0.7
};

let observer = new IntersectionObserver(navCheck, options);

function navCheck(entries){
    entries.forEach(entry => {
        const className = entry.target.className;
        const activeAnchor = document.querySelector(`[data-page=${className}]`);
        const coords = activeAnchor.getBoundingClientRect();

        const directions = {
            height: coords.height,
            width: coords.width,
            top: coords.top,
            left: coords.left
        };
        if(entry.isIntersecting){
            marker.style.setProperty("left", `${directions.left}px`);
            marker.style.setProperty("top", `${directions.top}px`);
            marker.style.setProperty("width", `${directions.width}px`);
            marker.style.setProperty("height", `${directions.height}px`);
        }
    });
}

sections.forEach(section => {
    observer.observe(section);    
});