@extends('template/admintemplate')

<div class="col-md-4 col-lg-4 jumbotron" style="margin: 100px 100px 400px">
    {{ Form::open(array('action' => 'AdminController@login')) }}
    @method('post')
	@csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>