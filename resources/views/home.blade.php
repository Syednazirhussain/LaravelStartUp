@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total User: &nbsp; {{ $total_users }}</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="{{ route('user.pdf.download') }}" class="btn btn-primary btn-sm">Download PDF</a> --}}
                        <a href="javascript:void(0);" id="downloadUserPDF" class="btn btn-primary btn-sm">Download PDF</a>
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm">Email PDF</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
    <script type="text/javascript">
        
        $(window).ready(function () {
            console.log("Nazir")
        })


        $("#downloadUserPDF").on("click", function () {

            $.ajax({
                url: "{{ route('user.pdf.download') }}",
                type: "GET"
            }).done(function (pdfString) {
                console.log(pdfString)
                
                // window.open("data:application/pdf," + encodeURI(pdfString));

                // let pdfWindow = window.open("")
                // pdfWindow.document.write(
                //     "<iframe width='100%' height='100%' src='data:application/pdf;base64, " +
                //     encodeURI(pdfString) + "'></iframe>"
                // )

                // openPDF(pdfString)

                // window.open("data:application/pdf," + escape(pdfString));

                window.open("data:application/octet-stream;charset=utf-16le;base64,"+pdfString);


                // let a = document.createElement("a");
                // a.href = "data:application/octet-stream;base64,"+pdfString;
                // a.download = "user-list.pdf"
                // a.click();


            }).catch(function (error) {
                console.log("Error: "+ error.message)
            })

        })

        function openPDF (pdfStream) {

            var byteCharacters = atob(pdfStream);
            var byteNumbers = new Array(byteCharacters.length);
            for (var i = 0; i < byteCharacters.length; i++) {
              byteNumbers[i] = byteCharacters.charCodeAt(i);
            }
            var byteArray = new Uint8Array(byteNumbers);
            var file = new Blob([byteArray], { type: 'application/pdf;base64' });
            var fileURL = URL.createObjectURL(file);
            window.open(fileURL);
        }


    </script>
@endsection
