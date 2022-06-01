


<div class="w-100 vh-100 row " > 
 <div class=" col-2  col ">
    <div class="row">
        <div class="col-12 card border bg-dark text-white">
            <img class="card-img-top" src="" alt="">
            <div class="card-body">
            <h4 class="card-title">  <?php



 echo ucfirst(  Core\Login::getRoleCookie());         ?>  </h4>
            <p class="card-text">
            Lorem Ipsum is simply dummy text of the
            </p>
            <p class="card-text">
            Lorem Ipsum is simply dummy text of the
            </p>
            </div>
        </div>

        <div class="col-12 col bg-white border  border-dark border-3 ">
        Lorem ipsum dolor sit amet consecsadgdhgwing elit. Dicta, voluptas.
        </div>

    </div>
<!------------------------------ admin-------------------------- -->
</div>
<?php     ?>
    <div class="col-10">
        <div class="continuer">
        <div class="   w-100 pt-4">
            <div>
            <?php       ?>
                <h1>unaccepted Doctors </h1>
                <div class="w-100 ">
                <table class="table table-dark w-100  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Family Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Function</th>
                                    <th scope="col">Delete Doctor from site</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                
                                foreach ($Doctors as $perDoctor) :   ?>
                                <tr>
                               
                                    <td class="m-1"> <?php echo $count++;   ?></td>
                                    <td><?php echo $perDoctor['name'];   ?></td>
                                    <td><?php echo $perDoctor['family_name'];   ?></td>
                                    <td><?php echo $perDoctor['email'];   ?></td>
                                    <td colspan="">
                                        <div class="d-flex flex-row">

                                            <?php  ?>
                                                <form class="m-1" action="/DashboardAdmin" method="post">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="doctor_id" value="<?= $perDoctor['id'] ?>">
                                                    <input type="hidden" name="doctor_status" value="1">
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-clipboard2-check-fill"></i></i></button>
                                                </form>
                                            <?php  ?>
                                           

                                        </div>
                                    </td>
        

                                </tr>
                                <?php  endforeach;  ?>
                        </table>
                </div>
                </div>
            </div>
        </div>
    
    </div>
 <?php     ?>
</div>

<!------------------------------ -------------------------- -->

</div>

<!-- <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
        Home
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
        Dashboard
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Orders
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        Products
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
        Customers
        </a>
    </li>
    </ul>
    
  
</div> -->
<!-- -------------------------------------------- -->