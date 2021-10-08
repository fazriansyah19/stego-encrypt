@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(10, 10, 87)">
                        <h3 class="text-center" style="color: white">Steganography Encryption</h3>
                    </div>
                    <div class="panel-body">
                        This app using LSB or Least Significant Bit Steganography. The Least Significant Bit steganography is one such technique in which least significant bit of the image is replaced with data bit. In this method the least significant bits of some or all of the bytes inside an image is replaced with a bits of the secret message.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(10, 10, 87)">
                        <h3 class="text-center" style="color: white">How to use</h3>
                    </div>
                    <div class="panel-body">
                        <h4>Encode</h4>
                        <p>
                            1. Upload a picture with extension jpg, jpeg, or png <br>
                            2. Input text in form field message <br>
                            3. Input a password (for Crypto LSB only) <br>
                            4. Click on encode button <br>
                            5. Right click on the crypted picture, and choose "save an image as"
                        </p>
                        <hr>
                        <h4>Decode</h4>
                        <p>
                            1. Upload a crypted picture with extension jpg, jpeg, or png <br>
                            2. Input a password (for Crypto LSB only) <br>
                            3. Click on decode button
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop