<form method="post" action="login">
<div class="container  d-flex flex-column d-flex align-items-center  justify-content-center max-width: 100%; ">
  <div class="text-danger">

    <?php 
    if(isset($error) )
    foreach($error as $err):
    ?>
    <p>
      <strong>
      <?= $err; ?>
      </strong>
    </p>
    <?php endforeach; ?>

   </div>

    <h2 class="text-center">login </h2>


  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form3Example3" name="user" class="form-control" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>
  
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form3Example4" name="password" class="form-control" />
    <label class="form-label" for="form3Example4">Password</label>
  </div>
  
  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <select name="role" class="browser-default custom-select">
      <option value="admin">admin</option>
      <option value="doctor">doctor</option>
      <option value="patient">patient</option>
    </select>
  </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4 ">Sign up</button>

  <!-- Register buttons -->


</div>
</form>