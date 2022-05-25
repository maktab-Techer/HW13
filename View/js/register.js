document.addEventListener('DOMContentLoaded', (event) => {
    console.log("hello")
    let selectEl = document.getElementById('selectShow');
   
    selectEl.addEventListener('change', (e) => {
      if (e.target.value == 'patient') {
        document.getElementById('description').style.display = 'block';
      } else {
        document.getElementById('description').style.display = 'none';
      }
    });
  })
