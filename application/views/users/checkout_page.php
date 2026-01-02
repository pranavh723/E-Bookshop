<?php 
if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<br>
<div class="row">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 text-uppercase" style="font-size: 1.1rem; letter-spacing: 1px;">Shipping Details</h5>
                    </div>
                    <div class="card-body p-4">
                        <?= form_open('checkout')?>
                                <div class="form-group mb-3">
                                        <?= form_input(['name'=>'name', 'placeholder'=>'Full Name', 'value'=>set_value('name'), 'class'=>'form-control rounded-pill px-4']) ?>
                                        <div class="text-danger small mt-1"><?= form_error('name')?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                                <?= form_input(['name'=>'email', 'placeholder'=>'Email Address', 'value'=>set_value('email'), 'class'=>'form-control rounded-pill px-4']) ?>
                                                <div class="text-danger small mt-1"><?= form_error('email')?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                                <?= form_input(['name'=>'contact', 'placeholder'=>'Phone Number', 'value'=>set_value('contact'), 'class'=>'form-control rounded-pill px-4']) ?>
                                                <div class="text-danger small mt-1"><?= form_error('contact')?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                        <?= form_textarea(['name'=>'address', 'placeholder'=>'Shipping Address',  'value'=>set_value('address'), 'class'=>'form-control rounded-3 px-4', 'rows'=>'3'])?>
                                        <div class="text-danger small mt-1"><?= form_error('address')?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                                <?= form_input(['name'=>'zipcode', 'placeholder'=>'Zip / Post Code', 'value'=>set_value('zipcode'), 'class'=>'form-control rounded-pill px-4']) ?>
                                                <div class="text-danger small mt-1"><?= form_error('zipcode')?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                                <?= form_input(['name'=>'city', 'placeholder'=>'City', 'value'=>set_value('city'), 'class'=>'form-control rounded-pill px-4']) ?>
                                                <div class="text-danger small mt-1"><?= form_error('city')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-3">
                                    <h6 class="fw-bold text-uppercase border-bottom pb-2 mb-3">Payment Method</h6>
                                    <div class="form-check custom-radio mb-2">
                                        <input class="form-check-input" type="radio" name="paymentcheck" id="cod" value="COD" checked>
                                        <label class="form-check-label" for="cod">
                                            Cash on Delivery (COD)
                                        </label>
                                    </div>
                                    <div class="form-check custom-radio mb-2">
                                        <input class="form-check-input" type="radio" name="paymentcheck" id="online" value="Online">
                                        <label class="form-check-label" for="online">
                                            Online Payment (Razorpay/Stripe)
                                        </label>
                                    </div>
                                    <div class="text-danger small"><?= form_error('paymentcheck')?></div>
                                </div>
                                
                                <div class="alert alert-light border small mt-4">
                                    By placing your order, you agree to our <a href="<?= base_url()?>users/terms" class="text-primary text-decoration-none">Terms and Conditions</a>.
                                </div>
                                
                                <div class="mt-4">
                                    <?= form_submit(['name'=> 'submit', 'value'=> 'Complete Purchase', 'class'=>'btn btn-primary btn-lg w-100 rounded-pill shadow-sm py-3'])?>
                                </div>
                        <?= form_close()?>
                    </div>
                </div>
        <div class="col-lg-6">
                <div id="table-header">order summary</div><br>
                <h5>Payments Details</h5>
                <?php
                        print "<table class = 'table'>";

                        print "<tr>";
                        print "<th>Total Book Price</th>";
                        print "<td colspan = '2'>Rs ".$this->cart->total()."</td>";
                        print "</tr>";

                        print "<tr>";
                        $shipping = 40;
                        print "<th>Shipping cost</th>";
                        print "<td colspan = '2'>Rs ".$shipping."</td>";
                        print "</tr>";

                        print "<tr>";
                        $payable_total = $this->cart->total() + $shipping;
                        print "<th>Total cost</th>";
                        print "<td colspan = '2'>Rs ".$payable_total."</td>";
                        print "</tr>";
                        
                        print "</table>";
                        
                        print "<h5>Your Products</h5>";
                        print "<table class = 'table border-bottom table-hover'>";
                        print "<tr>";
                        print "<th>Image</th><th>Book Name</th><th>Quantity</th><th>Price</th><th>Subtotal</th>";
                        print "</tr>";
                        foreach ($this->cart->contents() as $books) 
                        {
                                print "<tr>";
                                print "<td><img src = '".$books['book_image']."' alt = '' width='50' hieght='80'</td>";
                                print "<td>";
                                print $books['name'];
                                print "</td>";
                                print "<td>";
                                print $books['qty'];
                                print "</td>";
                                print "<td>Rs ";
                                print $books['price'];
                                print "</td>";
                                print "<td>Rs ";
                                print $books['subtotal'];
                                print "</td>";
                                print "</tr>";
                        }

                        print "</table>";
                ?>
        </div>
</div><br>
