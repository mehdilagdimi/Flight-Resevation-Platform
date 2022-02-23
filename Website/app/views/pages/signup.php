<?php

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <style>
                .gradient-custom {
                /* fallback for old browsers */
                background: #6a11cb;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
                }
                .gradient-custom-3 {
                /* fallback for old browsers */
                background: #84fab0;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
                }
                .gradient-custom-4 {
                /* fallback for old browsers */
                background: #84fab0;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
            }
        </style>
    </head>

    <body>
        <section class="h-auto" style="">
            <div class="mask d-flex align-items-center h-auto gradient-custom">
                <div class="container mh-100 my-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="<?= URLROOT ?>users/signup" method="POST">

                                <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required />
        
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control form-control-lg" required />
                                
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="birthdate">Birth Date</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" required />
                                
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="passw">Password</label>
                                <input type="password" id="passw" name="passw" class="form-control form-control-lg" required />
                               
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="passw_r">Repeat your password</label>
                                <input type="password" id="passw_r" name="passw_r" class="form-control form-control-lg" required />
                                
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                <input
                                    class="form-check-input me-2"
                                    type="checkbox"
                                    value=""
                                    id="form2Example3cg"
                                />
                                <label class="form-check-label" for="form2Example3g">
                                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-3 text-body">Register</button>
                                </div>

                                <!-- <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?= URLROOT . '/pages/signup'?>" class="fw-bold text-body"><u>Login here</u></a></p> -->
                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?= URLROOT ?>pages/login" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>