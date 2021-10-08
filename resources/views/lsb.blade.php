@extends('layouts.layout')
@section('title','LSB encode')
@section('javascript')
    @parent
    <script>
        var analyseUrlEncode = '{{route('lsb_encode')}}';
        var analyseUrlDecode = '{{route('lsb_decode')}}';
    </script>
    <script src="{{asset('js/encryption.js')}}"></script>
    <script src="{{asset('js/lsb_decode.js')}}"></script>
    @stop

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#encode">LSB Encode</a></li>
        <li><a data-toggle="tab" href="#decode">LSB Decode</a></li>
    </ul>

    <div class="tab-content">
        <div id="encode" class="tab-pane fade in active">
            <div class="container">
                <h3 style="display: inline-block">LSB Encode</h3>
                <div id="LSBEncode">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>
                                <div class="btn btn-primary btn-sm" v-if="pictures.original.length == 0">
                                    Upload Picture
                                </div>
                                <div v-if="pictures.original.length > 0">
                                    <div class="thumbnail">
                                        <img v-bind:src="pictures.original">
                                        <div class="caption">
                                            <p>Original picture</p>
                                        </div>
                                    </div>
                                </div>
                                <input style="display:none" type="file" v-on:change="onImageChangeOrig($event)">
                            </label>
                        </div>
                        <div class="col-lg-4" v-show="loadingEncode">
                            <div id="vue-pages-loader">
                                <div id="loader"></div>
                            </div>
                        </div>
                        <div class="col-lg-4" v-for="(picture, keyPicture) in pictures.containers">
                            <label>
                                <div v-if="picture.base64Picture.length > 0">
                                    <div class="thumbnail">
                                        <img v-bind:src="picture.base64Picture">
                                        <div class="caption">
                                            <p>Crypted Picture</p>
                                        </div>
                                    </div>
                                </div>
                                <input style="display:none" type="file">
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center" style="background-color: rgb(10, 10, 87); color: white">Information and Statistic</div>
                                <div class="panel-body bg-info">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge">@{{ maxlength }}</span>
                                            Max chars
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge">@{{ lengthText }}</span>
                                            Your chars
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge">@{{ seconds }}</span>
                                            Time until encode finishing, seconds
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <label for="textarea">Message:</label>
                                        <textarea id="textarea" class="form-control" rows="5" v-model="text"></textarea>
                                    </div>
                                    <div class="col-lg-2">
                                        <br>
                                        <div class="btn btn-success btn-sm" v-on:click="sendOnSever(event)">
                                            Encode
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div id="decode" class="tab-pane fade">
            <div class="container">
                <h3>LSB Decoder</h3>
                <div id="LSBDecode">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>
                                <div class="btn btn-primary btn-sm" v-if="pictures.original.length == 0">
                                    Upload Picture
                                </div>
                                <div v-if="pictures.original.length > 0">
                                    <div class="thumbnail">
                                        <img v-bind:src="pictures.original">
                                        <div class="caption">
                                            <p>Crypted Picture</p>
                                        </div>
                                    </div>
                                </div>
                                <input style="display:none" type="file" v-on:change="onImageChangeOrig($event)">
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center" style="background-color: rgb(10, 10, 87); color: white">Information</div>
                                <div class="panel-body bg-info">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge">@{{ seconds }}</span>
                                            Time until encode finishing, seconds
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col btn btn-success btn-sm" v-on:click="sendOnSever(event)">
                                                Decode
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="vue-pages-loader" v-show="loading">
                                        <div id="loader"></div>
                                        <br>
                                    </div>
                                    <div class="col-lg-12">
                                        @{{ text }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #vue-pages-loader {
            clear: both;
           }
        #vue-pages-loader > div {
            width: 40px;
            height: 40px;
            margin: 0 auto;
            background: url("/assets/img/loader.svg") no-repeat center; }
    </style>
@stop