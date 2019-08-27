  <?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
        }

    ?>
 


         <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                <?php echo date('Y');?> &copy; &nbsp;<?php echo $title;?>.
                            </div>
                         
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->