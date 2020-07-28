@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">Find Users</div>

                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <td>
                                First Name
                            </td>
                            <td>
                                <input class="form-control" type="text"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last Name
                            </td>
                            <td>
                                <input class="form-control" type="text"></input>
                            </td>
                        </tr>    
                        <tr>
                            <td>
                                Role
                            </td>
                            <td>
                                <select class="form-control">
                                        <option>---</option>
                                        <option>Account Client</option>
                                        <option>---</option>
                                        <option>Manager</option>
                                        <option>General Staff</option>
                                        <option>Clerk</option>
                                        
                                </select>
                            </td>
                        </tr>                          
                        <tr>
                            <td>
                                Company / Organization
                            </td>
                            <td>
                                <select class="form-control">
                                        <option>---</option>
                                        <option>Emmanuel College</option>
                                        <option>Sydney Cafe</option>
                                        <option>Argent</option>
                                        <option>Bellisimo</option>
                                        
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                State
                            </td>
                            <td>
                                <select class="form-control">
                                        <option>---</option>
                                        <option>Vic</option>
                                        <option>NSW</option>
                                        <option>Tas</option>
                                        <option>Qld</option>
                                        <option>SA</option>
                                        <option>WA</option>
                                </select>
                            </td>
                        </tr>                           
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <span style="float:right">
                                    <button class="submit">
                                        Search
                                    </button>
                                </span>
                            </td>
                        </tr>                                                                  
                    </table>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection
