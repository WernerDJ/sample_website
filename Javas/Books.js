// Get all the img elements
const images = document.getElementsByTagName('img');
// Loop through the images
for (const image of images) {
// Listen for the right click event on each image
image.addEventListener('contextmenu', function(e) {
// Prevent the context menu from appearing
e.preventDefault();
// Toggle the full-size class on the image
//image.classList.toggle('width: 100px');
  x = document.getElementsByTagName("img")[11];
       x.height = 50%;
       x.width = 50%;
});
}
