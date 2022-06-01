<div class="w-100 vh-100 row ">
    <div class=" col-2  col ">
        <div class="row">
            <div class="col-12 card border bg-dark text-white">
                <img class="card-img-top" src="<?php //  $selfPerson['img']  ?> " alt="">
                <div class="card-body">
                    <h4 class="card-title"> 
                        <?php echo ucfirst(Core\Login::getRoleCookie());         ?> 
                    </h4>
                    img
                    <p class="card-text">
                       <?=  ucfirst($selfPerson['name'])." ".ucfirst($selfPerson['family_name']) ; ?>
                    </p>
                    <p class="card-text">
                    <?=  ucfirst($selfPerson['email']) ;?>
                    </p>
                </div>
            </div>
<!-- 
            <div class="col-12 col bg-white border  border-dark border-3 ">
               <form class="flex-col" action="DashboardAdmin" method="post">
                   <label for="inout1">Name</label>
               <input class="form-control form-control-sm" type="text" placeholder="name" aria-label="inout1" >
               <label for="inout2">Familia Name</label>
               <input class="form-control form-control-sm" type="text" placeholder="name" aria-label="inout2" >
               </form>
               <label for="formFileSm" class="form-label">picture</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div> -->

        </div>
        <!------------------------------ doctor-------------------------- -->
    </div>

    <div class="col-10">
        <div class="continuer">
            <div class="row">


                <div class=" col-12  w-100 pt-4">
                    <h1> Doctors </h1>
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
                                if( $selfPerson['status']==1)
                                foreach ($Doctors as $perDoctor) :   ?>
                                <tr>
                               
                                    <td class="m-1"> <?php echo $count++;   ?></td>
                                    <td><?php echo $perDoctor['name'];   ?></td>
                                    <td><?php echo $perDoctor['family_name'];   ?></td>
                                    <td><?php echo $perDoctor['email'];   ?></td>
                                    <td colspan="">
                                        <div class="d-flex flex-row">

                                            <?php if ($perDoctor['status'] == 0 ) : ?>
                                                <form class="m-1" action="/DashboardAdmin" method="post">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="doctor_id" value="<?= $perDoctor['id'] ?>">
                                                    <input type="hidden" name="doctor_status" value="1">
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-clipboard2-check-fill"></i></i></button>
                                                </form>
                                            <?php endif ?>
                                            <?php if ($perDoctor['status'] == 1) : ?>
                                                <form class="m-1" action="/DashboardAdmin" method="post">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="doctor_id" value="<?= $perDoctor['id'] ?>">
                                                    <input type="hidden" name="doctor_status" value="0">
                                                    <button type="submit" class="btn btn-danger"><i class="bi  bi-clipboard-x-fill"></i></button>
                                                </form>
                                            <?php endif ?>

                                        </div>
                                    </td>
                                    <td>
                                        <form class="m-1" action="/DashboardAdmin" method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="doctor_id" value="<?= $perDoctor['id'] ?>">
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                <?php  endforeach;  ?>
                        </table>
                    </div>
                </div>
        <!------------------------------ admin-------------------------- -->

                <div class=" col-12  w-100 pt-4">
                    <h1> Admins </h1>
                    <div class="w-100 ">
                        <table class="table table-warning w-100  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Family Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Function</th>
                                    <?php  if($selfPerson['status']==-1):   ?>
                                        <th scope="col">Delete Doctor from site</th>
                                    <?php  endif;   ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if ($selfPerson['status'] == 1  ) 
                                foreach ($Admins as $admin) :   ?>
                                <tr>
                               
                                    <td class="m-1"> <?php echo $count++;   ?></td>
                                    <td><?php echo $admin['name'];   ?></td>
                                    <td><?php echo $admin['family_name'];   ?></td>
                                    <td><?php echo $admin['email'];   ?></td>
                                    <td colspan="">
                                        <div class="d-flex flex-row">
                                        
                                            <?php if ($admin['status'] == 0  ) : ?>
                                                <form class="m-1" action="/DashboardAdmin" method="post">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>">
                                                    <input type="hidden" name="admin_status" value="1">
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-clipboard2-check-fill"></i></i></button>
                                                </form>
                                            <?php endif ?>
                                            <?php if ($admin['status'] == 1) : ?>
                                                <form class="m-1" action="/DashboardAdmin" method="post">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>">
                                                    <input type="hidden" name="admin_status" value="0">
                                                    <button type="submit" class="btn btn-danger"><i class="bi  bi-clipboard-x-fill"></i></button>
                                                </form>
                                            <?php endif ?>

                                        </div>
                                    </td>
                                    <?php  if($selfPerson['status']==-1):   ?>
                                    <td>
                                        <form class="m-1" action="/DashboardAdmin" method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="doctor_id" value="<?= $admin['id'] ?>">
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                    <?php  endif;   ?>

                                </tr>
                                <?php  endforeach;  ?>
                        </table>
                    </div>
                </div>
                <!-- -----------------------------ADD Departments----------------------- -->
                <div class="col-12">
                    
                    <div class="row">
                        <div class="col-12">
                            <h1>Departments</h1>

                        </div>
                        <div class="col-12">
                            <?php  if( $selfPerson['status']==1): ?>
                            <form class="row" action="/DashboardAdmin" method="POST">
                            <div class="col-auto">
                                <label for="DepartmentsFS"  class="visually-hidden">Add Departments</label>
                                <input type="text" name="Add_department" class="form-control" id="DepartmentsFS" placeholder="Departments">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Add</button>
                            </div>
                            </form>
                            <?php  endif; ?>

                        </div>
                        <div>
                            <table class="table table-secondary">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Function</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 1;
                                if( $selfPerson['status']==1)
                                foreach ($Departments as $Department)  : ?>
                                    <tr>
                                    <th scope="row"> <?=  $count++  ?></th>
                                    <td><?=  $Department['name']  ?></td>
                                    <td>
                                    <form class="m-1" action="/DashboardAdmin" method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="department_id" value="<?= $Department['id'] ?>">
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    </td>
                                    <td>

                                        <form class="m-1" action="/DashboardAdmin" method="post">
                                            <input type="hidden" name="_method" value="put">
                                            <input class="pt-1" type="hidden" name="department_id" value="<?= $Department['id'] ?>">
                                            <input type="text" name="department_edit"  >
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                    </td>
                                    </tr>
                                <?php  endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                                    
                
            </div>

        </div>
        <?php      ?>
    </div>

    <!------------------------------ -------------------------- -->




    <!-- -------------------------------------------- -->