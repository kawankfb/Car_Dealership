@extends('header')
@section('link')
    <link rel="stylesheet" href="css/profile.css">
@endsection()
@section('content')
    <div class="container profile-container">
        <div class="row">
            <div class="col-lg-3">
                <div class="portlet light profile-sidebar-portlet bordered">
                    <!-- profile image -->
                    <div class="profile-userpic">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid" alt="profile-img">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{$data->name.' '.$data->last_name}}</div>
                    </div>
                    <!-- choose image -->
                    <div class="form-group choose-img">
                        <form action="#"method="POST">
                            @csrf
                        <label for="InputImage">Image input</label>
                        <input type="file" id="InputImage">
                        </form>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>
                    </li>
                    <li class="list-group-item text-right"><span class="float-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="float-left"><strong>Favorites</strong></span> 13</li>
                </ul>
            </div>

            <!-------- portlet column ------->
            <div class="col-lg-9">
                <div class="portlet light bordered">
                    <!-- portlet title -->
                    <div class="portlet-title tabbable-line">
                        <span class="caption-subject font-blue-madison bold uppercase">Your info</span>
                    </div>
                    <div class="portlet-body">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">Profile</a>
                                </li>
                                <li role="presentation" class="nav-item">
                                    <a href="#myPosts" aria-controls="myPosts" role="tab" data-toggle="tab" class="nav-link">My Posts</a>
                                </li>
                                <li role="presentation" class="nav-item"><a href="#favorites" aria-controls="favorites" role="tab" data-toggle="tab"
                                                                            class="nav-link">favorites</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <form class="form-info" method="POST" action="{{route('profile.edit')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" value="{{$data->name}}" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputLastName">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" name="lastname"
                                                   value="{{$data->last_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                   value="{{$data->email}}" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phoneNumber">Phone number</label>
                                            <input type="number" class="form-control" id="phoneNumber"
                                                   value="{{$data->phone_number}}" name="phone">
                                        </div>
                                        <!-- province and city -->
                                        <div class="row two-col">
                                            <select class="province" required>
                                                <option> <p id="#province">Semnan</p> &emsp;</option>
                                            </select>
                                            <select class="city" required>
                                                <option> <p id="#city">Shahrood</p> &ensp;&nbsp;</option>
                                            </select>
                                        </div>
                                        <!-- confirm button -->
                                        <button type="submit" class="btn confirm-btn">Confirm</button>
                                    </form>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="myPosts">

                                    <div class="main">
                                        <div class="fav-car-box">
                                            <img class="car-img" src="images/car1.jpg" alt="">
                                            <h4 class="title" style="margin-left: 1rem;">title of this advertisment</h4>
                                            <!-- <ion-icon name="heart" style="color: red;"></ion-icon> -->
                                            <a class="delete" href="#"><ion-icon name="trash-outline"></ion-icon></a>
                                            <div class="row">
                                                <label class="col col-md-5">Price: <span>90 millions</span></label>
                                                <label class="col col-md-5">Production Year: <span>1390</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5" style="margin-right: 3px;">Province :<span>West Azerbaijan</span></label>
                                                <label class="col col-md-5">City :<span>Urmia</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5">Brand: <span>brand from db</span></label>
                                                <label class="col col-md-5">Model: <span>model from db</span></label>
                                            </div>
                                            <a href="#"><ion-icon class="forward" name="chevron-forward-outline"></ion-icon></a>
                                        </div>

                                        <div class="fav-car-box">
                                            <img class="car-img" src="images/car1.jpg" alt="">
                                            <h4 class="title" style="margin-left: 1rem;">title of this advertisment</h4>
                                            <!-- <ion-icon name="heart" style="color: red;"></ion-icon> -->
                                            <a class="delete" href="#"><ion-icon name="trash-outline"></ion-icon></a>
                                            <div class="row">
                                                <label class="col col-md-5">Price: <span>90 millions</span></label>
                                                <label class="col col-md-5">Production Year: <span>1390</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5" style="margin-right: 3px;">Province :<span>West Azerbaijan</span></label>
                                                <label class="col col-md-5">City :<span>Urmia</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5">Brand: <span>brand from db</span></label>
                                                <label class="col col-md-5">Model: <span>model from db</span></label>
                                            </div>
                                            <a href="#"><ion-icon class="forward" name="chevron-forward-outline"></ion-icon></a>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="favorites">
                                    <div class="main">
                                        <div class="fav-car-box">
                                            <img class="car-img" src="images/car1.jpg" alt="">
                                            <h4 class="title" style="margin-left: 1rem;">title of this advertisment</h4>
                                            <!-- <ion-icon name="heart" style="color: red;"></ion-icon> -->
                                            <a class="delete" href="#"><ion-icon name="trash-outline"></ion-icon></a>
                                            <div class="row">
                                                <label class="col col-md-5">Price: <span>90 millions</span></label>
                                                <label class="col col-md-5">Production Year: <span>1390</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5" style="margin-right: 3px;">Province :<span>West Azerbaijan</span></label>
                                                <label class="col col-md-5">City :<span>Urmia</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5">Brand: <span>brand from db</span></label>
                                                <label class="col col-md-5">Model: <span>model from db</span></label>
                                            </div>
                                            <a href="#"><ion-icon class="forward" name="chevron-forward-outline"></ion-icon></a>
                                        </div>

                                        <div class="fav-car-box">
                                            <img class="car-img" src="images/car1.jpg" alt="">
                                            <h4 class="title" style="margin-left: 1rem;">title of this advertisment</h4>
                                            <!-- <ion-icon name="heart" style="color: red;"></ion-icon> -->
                                            <a class="delete" href="#"><ion-icon name="trash-outline"></ion-icon></a>
                                            <div class="row">
                                                <label class="col col-md-5">Price: <span>90 millions</span></label>
                                                <label class="col col-md-5">Production Year: <span>1390</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5" style="margin-right: 3px;">Province :<span>West Azerbaijan</span></label>
                                                <label class="col col-md-5">City :<span>Urmia</span></label>
                                            </div>
                                            <div class="row">
                                                <label class="col col-md-5">Brand: <span>brand from db</span></label>
                                                <label class="col col-md-5">Model: <span>model from db</span></label>
                                            </div>
                                            <a href="#"><ion-icon class="forward" name="chevron-forward-outline"></ion-icon></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection()

