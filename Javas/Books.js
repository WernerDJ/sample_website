// Get all the img elements
const images = document.getElementsByTagName('img');
// Loop through the images
for (const image of images) {
// Listen for the right click event on each image
image.addEventListener('contextmenu', function(e) {
// Prevent the context menu from appearing
e.preventDefault();
// Toggle the full-size class on the image
image.classList.toggle('full-size');
});
}
