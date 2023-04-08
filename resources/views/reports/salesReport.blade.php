@extends('layout')
@section('content')

<style>
   
        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            gap: 2px;
            padding: 5px;
            height:55px;
            margin:2px;
            }

        .grid-container > div {
            text-align: center;
            font-size: 14px;
            font-weight:bold;
            text-align:right;
            padding:2px;
			background-color:#bad5ef;
			border-radius:6px;
            }
</style>

<div class="container-fluid containerDiv">
    <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-3 sideBar">
                <fieldset class="border rounded mt-5 sidefieldSet">
                    <legend  class="float-none w-auto legendLabel mb-0">  گزارشات فروش  </legend>
                    <form action="{{url('/getSalesReportInfo')}}" method="get" id='salesReportForm'>
                        <div class="form-group col-sm-12">
                            <label class="dashboardLabel form-label"> جستجو</label>
                            <input type="text" name="nameCode" size="20" class="form-control form-control-sm" id="searchAllCName">
                        </div>
                        <div class="form-group col-sm-12 mb-1">
                            <label for="" class="form-label"> منطقه  </label>
                            <select class="form-select form-select-sm" name="mantaghehName" id="AllByAdmin">
                                <option value=""> همه</option>
                                @foreach($regions as $region)
                                <option value="{{$region->NameRec}}">{{$region->NameRec}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 mb-1">
                            <input type="text" name="firstDate" placeholder="از تاریخ" class="form-control form-control-sm" id="firstDateReturned">
                        </div>
                        <div class="form-group col-sm-12 mb-2">
                            <input type="text" name="secondDate" placeholder="تا تاریخ" class="form-control form-control-sm" id="secondDateReturned">
                        </div>
                    
                        <div class="form-group col-sm-12 mb-1">
                            <label for="" class="form-label">پشتیبان</label>
                            <select class="form-select form-select-sm" name="adminName" id="AllByAdmin">
                                <option value=""> همه</option>
                                <option value="00000000000000">بدون پشتیبان</option>
                                @foreach($poshtibans as $poshtiban)
                                <option value="{{$poshtiban->name}}">{{$poshtiban->name.' '.$poshtiban->lastName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-md btn-success" Type="submit">بازخوانی</button>
                    </form>
                </fieldset>
                </div>
            <div class="col-sm-10 col-md-10 col-sm-12 contentDiv">
                <div class="row contentHeader"> </div>
                <div class="row mainContent">
                     <table class="select-highlight table table-bordered table-striped" id="">
                            <thead class="tableHeader">
                                <tr>
                                    <th>ردیف</th>
                                    <th>مشتری</th>
                                    <th>کد</th>
                                    <th>مبلغ خرید(تومان) </th>
                                    <th style="width:122px">تعداد فاکتور</th>
                                </tr>
                            </thead>
                            <tbody class="tableBody" id="salesReportList">
                            </tbody>
                        </table>
                        <div class="grid-container">
                            <div class="item1"> <b> مجموع فاکتور   :  </b> <span id="customersMoney">  </span> </div>
                            <div class="item2"> <b>  تعداد فاکتور  :  </b> <span id="customersCountFactor"> </span>    </div>
                        </div>
                       
                </div>
                <div class="row contentFooter"> </div>
            </div>
    </div>
</div>
@endsection