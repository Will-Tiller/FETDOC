
const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  
  
  form.submit();  
});


var ctx = document.getElementById('myChart');
var chart = new Chart(ctx, {
  // ... config
});