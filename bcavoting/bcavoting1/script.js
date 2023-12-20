var tl = gsap.timeline()

tl.from(".nav img,.nav-part1 h3,.nav-part2 h3,.nav-part2 button ",{
    y:-100,
    duration:1,
    opacity:0,
    stagger:0.4

})
tl.from(".main>h1",{
    y:100,
    opacity:0,
    stagger:0.3
})
tl.from("#img1",{
    opacity:0,
    scale:0,
    stagger:0.3
})


// // Function to redirect to the results page
// function redirectToResultsPage() {
//     window.location.href = '/api/results.php'; // Replace with the actual URL of your results page
// }

// // Start the countdown timer
// function startCountdown() {
//     var countdownElement = document.getElementById('countdown');
//     var remainingTime = 60;

//     function updateCountdown() {
//         var minutes = Math.floor(remainingTime / 60);
//         var seconds = remainingTime % 60;
//         countdownElement.textContent = minutes + 'm ' + seconds + 's';

//         if (remainingTime <= 0) {
//             redirectToResultsPage(); // Redirect when the timer reaches 0
//         } else {
//             remainingTime--;
//             setTimeout(updateCountdown, 1000); // Update every second
//         }
//     }

//     updateCountdown();
// }

// // Call the countdown function when the page loads
// window.addEventListener('load', startCountdown);