@extends('student.dash')
@section('content')
<h2>Hello, {{$student->getInfo()->getFullName()}}</h2>
<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Update Bank Details</h4></div>
            <div class="panel-body">
                <form class="form" action="/student/update_bank" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-0" >
                        @error('message')
                        <div class='alert alert-danger'>
                          <span >
                            {{$message}}
                      &times;</span>
                        </div>
                        @enderror

                        @isset($pageMessage)
                        <div class='alert alert-success' >
                          <span >
                            {{$pageMessage}}
                      </span>
                        </div>
                        @endisset

                    </div>
                    <div class="form-group">
                        <label for="accountName" class="text-info text-left">Account Name <span class="text-danger">*</span></label><br>
                        <input type="text" list="accountNameList" required name="accountName" placeholder="Account Name" id="accountName" class="form-control">
                        <datalist id="accountNameList">
                            <option value="{{$student->getAccountName()}}">
                            <option value="{{old('accountName')}}">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="accountNumber" class="text-info text-left">Account Number <span class="text-danger">*</span></label><br>
                        <input type="text" list="accountNumberList" pattern="^[0-9]{10}$" required name="accountNumber" placeholder="Account Number" id="accountNumber" class="form-control">
                        <datalist id="accountNumberList">
                            <option value="{{$student->getAccountNumber()}}">
                            <option value="{{old('accountNumber')}}">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="bankName" class="text-info text-left">Bank Name <span class="text-danger">*</span></label><br>
                        <input type="text" list="bankNameList" required name="bankName" placeholder="Bank Name" id="bankName" class="form-control">
                        <datalist id="bankNameList">
                            <option value="{{$student->getBankName()}}">
                            <option value="{{old('bankName')}}">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="bankSortCode" class="text-info text-left">Bank Sort Code <span class="text-danger">*</span></label><br>
                        <input type="text" list="bankSortCodeList" required name="bankSortCode" placeholder="Bank Name" id="bankSortCode" class="form-control">
                        <datalist id="bankSortCodeList">
                            <option value="{{$student->getBankSortCode()}}">
                            <option value="{{old('bankSortCode')}}">
                        </datalist>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Update</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
