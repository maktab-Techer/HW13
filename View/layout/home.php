
<div id="preview" class="preview">
    <div style="display: none;"></div>
    <div >
        <div data-draggable="true" class="" style="position: relative;" draggable="false">
            <!---->
            <!---->
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">
                    <div class="p-5 text-center bg-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1620207418302-439b387441b0?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=Mnw5NjI0M3wwfDF8c2VhcmNofDExfHxtb2Rlcm58ZW58MHx8fHwxNjUyMjEyNTI2&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&quot;); height: 500px; background-size: cover; background-position: 50% center; background-color: transparent;" aria-controls="#picker-editor">
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7)">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="text-white text-center">
                                            <h2 class="mb-4 px-4 px-md-5 display-3 fw-bold ls-tight">  Welcome Clinic </h2>
                                            <p class="text-white  lead mb-0 px-4 px-md-5">
                                                <?php if( Core\Login::loginCheck()){  ?>
                                                    <p>
                                                        <h3>
                                                        <?php echo   Core\Login::getUserNameCookie();         ?>
                                                        </h3>
                                                    </p>

                                                <?php }else{  ?>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officia consequatur adipisci tenetur repudiandae rerum quos.
                                                <?php }  ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <!---->
        </div>
        <div data-draggable="true" class="" style="position: relative;" draggable="false">
            <!---->
            <!----------------- table----------------------------------- -->
            <div class="mdb-placeholder" data-v-271253ee=""></div>

            <section draggable="false" class="container pt-5" data-v-271253ee="">
                
                <section class="mb-10">
                <div class="w-25 py-2">
                    <form class="d-flex " method="post" action="/"  role="search">
                        <input type="hidden" name="_method" value="put">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <input class="form-control me-2" name="doctor_search_bar" type="search" placeholder="Search" value="<?php echo $search ??''  ?>" aria-label="Search">
                    </form>
                </div>
                    <?php 
                    // $search  ;
                    //     var_dump($search);         
                        // var_dump(Core\Application::GETCLASS()->GETPROPERTY('storage')."image/doctor-character-background_defult.png");
                        //      file_get_contents(Core\Application::GETCLASS()->GETPROPERTY('storage')."image/doctor-character-background_defult.png");
                        $count_hagdfk=0;
                    foreach($doctors as $doctor):
                        $count_hagdfk++;
                        if(fmod($count_hagdfk,4)==1):?>
                            <div class="row  gx-4 py-2">
                        <?php endif;  ?>
                        <div class="col"> 
                            
                            <div class="card" style="width: 18rem;">
                                <img
                                 src='<?=strlen($doctor['img'])  ?>' 
                                 class="card-img-top" 
                                 alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?=$doctor['name'] ?></h3>
                                    <h6 class="card-title"><?=$doctor['specialty'] ?></h6>
                                    <p class="card-text"><?=$doctor['description'] ?></p>
                                </div>
                            </div>
                            
                        <?php if(fmod($count_hagdfk,3)==0):?>
                        </div>
                        <?php endif;  ?>
                    </div>
                    <?php endforeach; ?>
                </section>
            </section>
            <!-------------------------------------------------------------------->
        </div>
    </div>
</div>