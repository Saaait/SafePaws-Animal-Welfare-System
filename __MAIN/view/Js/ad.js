// // Variables for image rotation
// const images = [
//     "6th.jpg",
//     "7th.jpg",
//     "8th.jpg",
//     // Add more image URLs as needed
// ];
// let currentIndex = 0;

// // Function to change the displayed image
// function changeImage() {
//     currentIndex = (currentIndex + 1) % images.length; // Loop back to the first image
//     document.getElementById("petImage").src = images[currentIndex];
// }

// // Set interval for image rotation every 5 seconds
// setInterval(changeImage, 5000); // Change image every 5 seconds

// Variables for testimonial rotation
let currentTestimonial = 0;
const testimonials = document.querySelectorAll('.testimonial-item');

// Function to change the displayed testimonial
function changeTestimonial() {
    testimonials[currentTestimonial].classList.remove('active'); // Remove active class from current testimonial
    currentTestimonial = (currentTestimonial + 1) % testimonials.length; // Move to the next testimonial
    testimonials[currentTestimonial].classList.add('active'); // Add active class to the new current testimonial
}

// Set interval for testimonial rotation every 5 seconds
setInterval(changeTestimonial, 5000); // Change testimonial every 5 seconds





