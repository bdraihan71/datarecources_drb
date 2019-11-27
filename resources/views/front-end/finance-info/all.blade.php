@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement" id="mainApp">
    <div class="container h-100">
        <h3>Financial Statements </h3>
        <p>We have curated data from different companies for you. </p>
        <form action="{{route('financefilter')}}" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Sector</label>
                <select class="form-control" id="exampleFormControlSelect1" v-model="chosen_sector" @change="onChange">
                    <option >Choose sector...</option>
                    @foreach ($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Company</label>
                <select class="form-control" id="exampleFormControlSelect1" name="company">
                    <option value=''>Choose company...</option>
                    <option v-for="company in companies" :value="company.id" >@{{company.name}}</option>

                </select>
            </div>

            <div class="form-group">
                <label for="frequency">Frequency:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="yearly" name="frequency" onclick="hide();">
                    <label class="form-check-label">Yearly</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="quarterly" name="frequency" onclick="show();">
                    <label class="form-check-label">Quarterly</label>
                </div>
            </div>

            <div class="form-group drb-hide" id="drb-hide-div">
                <label for="frequency">Quarterly:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="q1" value="q1">
                    <label class="form-check-label">Q1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="q2" value="q2">
                    <label class="form-check-label">Q2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="q3" value="q3">
                    <label class="form-check-label">Q3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="q4" value="q4">
                    <label class="form-check-label">Q4</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form></br>
        <div class="row align-items-center h-100">
            <div class="col-md-12 text-center">
                @if($frequency == 'yearly')
                    @include('front-end.finance-info.yearlydata')  
                @elseif($frequency == 'quarterly')
                    @include('front-end.finance-info.quarterlydata')
                @else
                    @include('front-end.finance-info.datatable')     
                       
                @endif 
                     
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app = new Vue({
    el: '#mainApp',
    data () {
        return {
        chosen_sector: null,
        companies: [],
        }
    },
    methods: {
        onChange: function(){
        if(this.chosen_sector!=null){
            fetch('/api/getcompany/' + this.chosen_sector)
            .then(function(response) {
                return response.json();
            })
            .then(response => (this.companies = (response)))
        }
        }
    },

    })
</script>
<script>
    function hide(){
    document.getElementById('drb-hide-div').style.display ='none';
    }
    function show(){
    document.getElementById('drb-hide-div').style.display = 'block';
    }
</script>
@endsection