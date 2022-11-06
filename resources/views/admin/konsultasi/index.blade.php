@extends('layouts.app')

@section('title', 'Konsultasi')
@section('page', 'Konsultasi')
@section('content')
<div class="container-fluid">
  
    <div class="row">
        
        <div class="col-lg-4">
            <div class="card chat-list-card mb-xl-0">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="assets/images/users/user-1.jpg" alt="" class="flex-shrink-0 rounded-circle avatar-sm">
                        </div>
                        <div class="flex-grow-1 align-items-center ms-2">
                            <h5 class="mt-0 mb-1">Alfa Code</h5>
                            <p class="font-13 text-muted mb-0">Admin Head</p>
                        </div>
                        
                    </div>

                    <hr class="my-3">

                    <div class="search-box chat-search-box">
                        <input type="text" class="form-control" placeholder="Search...">
                        <i class="mdi mdi-magnify search-icon"></i>
                    </div>

                    <hr class="my-3">

                    <div class="">
                        <ul class="list-unstyled chat-list mb-0" style="max-height: 413px;" data-simplebar>
                            <li class="active">
                                <a href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                            <img src="assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="">
                                        </div>
                                        
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-14 mt-0 mb-1">Margaret Clayton</h5>
                                            <p class="text-truncate mb-0">I've finished it! See you so...</p>
                                        </div>
                                        <div class="font-11">05 min</div>
                                    </div>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 chat-user-img active avatar-sm align-self-center me-2">
                                            <span class="avatar-title rounded-circle bg-soft-success text-success">
                                                <i class="mdi mdi-account"></i>
                                            </span>
                                        </div>
                                        
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-14 mt-0 mb-1">Jason Bent</h5>
                                            <p class="text-truncate mb-0">Hey! there I'm available</p>
                                        </div>
                                        <div class="font-11">20 min</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="conversation-list-card card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="mt-0 mb-1 text-truncate">Margaret Clayton</h5>
                            {{-- <p class="font-13 text-muted mb-0"><i class="mdi mdi-circle text-success me-1 font-11"></i> Active</p> --}}
                            <p class="font-13 text-muted mb-0">24 Minute Ago</p>
                        </div>
                    </div>
                    <hr class="my-3">

                    <div>
                        <ul class="conversation-list slimscroll" style="max-height: 410px;" data-simplebar>
                            <li>
                                <div class="chat-day-title">
                                    <span class="title">Konseling Permasalahan</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-list">
                                    <div class="chat-avatar">
                                        <img src="assets/images/users/user-2.jpg" alt="">
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <span class="user-name">Margaret Clayton</span>
                                            <p>
                                                Hello!
                                            </p>
                                        </div>
                                        <span class="time">10:00</span>
                                    </div>
                                </div>
                            </li>

                            <li class="odd">
                                <div class="message-list">
                                    <div class="chat-avatar">
                                        <img src="assets/images/users/user-1.jpg" alt="">
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <span class="user-name">Nowak Helme</span>
                                            <p>
                                                Hi, How are you? What about our next meeting?
                                            </p>
                                        </div>
                                        <span class="time">10:01</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="message-list">
                                    <div class="chat-avatar">
                                        <img src="assets/images/users/user-2.jpg" alt="">
                                        
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <span class="user-name">Margaret Clayton</span>
                                            <p>
                                                Yeah everything is fine
                                            </p>
                                        </div>
                                        <span class="time">10:03</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-list">
                                    <div class="chat-avatar">
                                        <img src="assets/images/users/user-2.jpg" alt="male">
                                        
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <span class="user-name">Margaret Clayton</span>
                                            <p>
                                                & Next meeting tomorrow 10.00AM
                                            </p>
                                        </div>
                                        <span class="time">10:03</span>
                                    </div>
                                </div>
                            </li>

                            <li class="odd">
                                <div class="message-list">
                                    <div class="chat-avatar">
                                        <img src="assets/images/users/user-1.jpg" alt="">
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <span class="user-name">Nowak Helme</span>
                                            <p>
                                                Wow that's great
                                            </p>
                                        </div>
                                        <span class="time">10:04</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-3 conversation-input border-top">
                    <div class="row">
                        <div class="col">
                            <div>
                                <input type="text" class="form-control" placeholder="Enter Message...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary chat-send width-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
</div>
@endsection