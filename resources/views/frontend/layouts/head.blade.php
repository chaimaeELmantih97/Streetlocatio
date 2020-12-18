<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <title>StreetLocation, Home-1</title>
    <link href="{{url('assets2/css/master.css')}}" rel="stylesheet">
    <link href="{{url('assets2/plugins/iview/css/iview.css')}}" rel="stylesheet">
    <link href="{{url('assets2/plugins/iview/css/skin/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{url('assets2/plugins/jquery/jquery-1.11.1.min.js')}}"></script>
    <link href="{{url('assets2/NV/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets2/NV/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
   @toastr_css
 
    @php
    $settings=DB::table('settings')->get();
    @endphp  
    @foreach($settings as $data)
    <link rel="shortcut icon" type="image/x-icon" href="{{url('storage/settings/'.$data->logo)}}">
    @endforeach
    <style>
      body{
        overflow-x: hidden;
      }
    .form-section{
      position: relative;
      background-color: rgb(255, 255, 255);
      margin-top: -16vh;
      z-index: 10;
      box-shadow: 0 0 0 rgba(70, 70, 70, 0.459);
      border-radius: 5px;
      width: 90vw;
    }

    input {
      outline: none;
      margin: 0;
      border: none;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      width: 100%;
      font-size: 14px;
      font-family: inherit;
    }

    .input-group {
      position: relative;
      border:0 0 2px 0;
      border-bottom: 2px solid #D42B12;
    }

    .input-icon {
      position: absolute;
      font-size: 18px;
      color: #D42B12;
      right: 8px;
      top: 50%;
      -webkit-transform: translateY(-50%);
      -moz-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      -o-transform: translateY(-50%);
      transform: translateY(-50%);
      cursor: pointer;
    }

    .input--style-1 {
      padding: 9px 0;
      color: #D42B12;
    }

    .input--style-1::-webkit-input-placeholder {
      /* WebKit, Blink, Edge */
      color: #e43015a1;
    }

    .input--style-1:-moz-placeholder {
      /* Mozilla Firefox 4 to 18 */
      color: #e43015a1;
      opacity: 1;
    }

    .input--style-1::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      color: #e43015a1;
      opacity: 1;
    }

    .input--style-1:-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: #e43015a1;
    }

    .input--style-1:-ms-input-placeholder {
      /* Microsoft Edge */
      color: #e43015a1;
    }
    .row-space {
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      -moz-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
    }

  </style>
  </head>
  