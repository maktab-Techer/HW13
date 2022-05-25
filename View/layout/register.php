<div class="container d-flex flex-column justify-content-center max-width: 100%; ">
<form method="post" action="register">
  <!-- 2 column grid layout with text inputs for the first and last names -->

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="name" id="form3Example1" class="form-control" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" name="family_name" id="form3Example2" class="form-control" />
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form3Example3" class="form-control" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>
  
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form3Example4" class="form-control" />
    <label class="form-label" for="form3Example4">Password</label>
  </div>

    <!-- description -->
    <div class="form-outline mb-4" id="description1">
    <textarea  name="description" id="form3Example5" class="form-control" /> </textarea>
    <label class="form-label" for="form3Example5">description</label>
  </div>
  <!-- select -->
  <div class="form-check d-flex justify-content-center mb-4">
    <select id="selectShow" name="role" class="browser-default custom-select">
      <option value="patient">patient</option>
      <option value="admin">admin</option>
      <option value="doctor">doctor</option>
    </select>
  </div>


  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

 
  
</form>
  </div>

<script  >
  
  // document.addEventListener('DOMContentLoaded', (event) => {
    console.log("hello")
    let selectEl = document.getElementById('selectShow');
   
    selectEl.addEventListener('change', (e) => {
      if (e.target.value == 'patient') {
        document.getElementById('description1').style.display = 'block';
      } else {
        document.getElementById('description1').style.display = 'none';
      }
    });
  // })


</script>