@extends('layouts.main', ['activePage' => "contactus"])

@section('title', 'Page Title')

@section('content')
    <div class="shadow p-3 mb-5 bg-light rounded">
        {{--<img style="width: 100%" src="http://facultymembers.sbu.ac.ir/eslahchi/site/wp-content/uploads/2014/10/logo_final_2.png">--}}
            <h5>Contact us</h5><hr>
        <div class="row">
            <div class="col-md-6">
                <br>
                <p>Main Office:Department of Computer Science, Shahid Beheshti University</p>
                <p>Evin, Tehran, 1983963113 Iran</p>

                <p>Phone: 0098 21 22431653</p>
                <p>Email: ch-eslahchi@sbu.ac.ir</p>
                <hr>
                <div>
                    <form class="needs-validation was-validated" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">First name</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required>
                                <div class="invalid-feedback">
                                    Please Enter your First name
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Last name</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" required>
                                <div class="invalid-feedback">
                                    Please Enter your Last name
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="email" class="form-control" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please Enter your Email
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-12">
                            <label for="validationCustom03">Message</label>
                            <textarea type="text" class="form-control" style="height: 300px" id="validationCustom03" placeholder="Message" required></textarea>
                            <div class="invalid-feedback">
                                Please enter your message.
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <h6>IPM Center</h6>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6471.937270924808!2d51.46025951303589!3d35.80070330449396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e05affeadc75b%3A0x22641e79139e07ed!2z2b7amNmI2YfYtNqv2KfZhyDYr9in2YbYtCDZh9in24wg2KjZhtuM2KfYr9uM!5e0!3m2!1sen!2sde!4v1533465502966" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                <br>
                <h6>Shahid Beheshti University</h6>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.177636237292!2d51.39577301542293!3d35.7955721801678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e062fdcdba175%3A0x901200f797e5f43c!2z2K_Yp9mG2LTar9in2Ycg2LTZh9uM2K8g2KjZh9i02KrbjA!5e0!3m2!1sen!2sde!4v1533465711187" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection