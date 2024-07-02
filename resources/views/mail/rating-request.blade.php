<!DOCTYPE html>
<html>
<head>
    <title>Rate Our Reservation Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .content {
            margin-bottom: 20px;
        }
        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .rating label {
            font-size: 1.5em;
            margin: 0 10px;
            cursor: pointer;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        Rate Our Reservation Services
    </div>
    <div class="content">
        <p>We hope you enjoyed your experience with our reservation services. Please take a moment to rate us by clicking on one of the stars below:</p>
    </div>
    <div class="rating">
        <a href="{{ url('/rate?rating=1') }}" class="btn">★</a>
        <a href="{{ url('/rate?rating=2') }}" class="btn">★</a>
        <a href="{{ url('/rate?rating=3') }}" class="btn">★</a>
        <a href="{{ url('/rate?rating=4') }}" class="btn">★</a>
        <a href="{{ url('/rate?rating=5') }}" class="btn">★</a>
    </div>
    <div>
        <a href="{{ url('/rate') }}" class="btn">Rate Our Service</a>
    </div>
</div>
</body>
</html>



{{--    <!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Rate Our Reservation Services</title>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            background-color: #f4f4f4;--}}
{{--            color: #333;--}}
{{--        }--}}
{{--        .container {--}}
{{--            background-color: #fff;--}}
{{--            padding: 20px;--}}
{{--            border-radius: 5px;--}}
{{--            max-width: 600px;--}}
{{--            margin: 20px auto;--}}
{{--            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}
{{--        .header {--}}
{{--            font-size: 1.5em;--}}
{{--            margin-bottom: 10px;--}}
{{--        }--}}
{{--        .form-group {--}}
{{--            margin-bottom: 15px;--}}
{{--        }--}}
{{--        .form-group label {--}}
{{--            display: block;--}}
{{--            margin-bottom: 5px;--}}
{{--        }--}}
{{--        .form-group input,--}}
{{--        .form-group textarea {--}}
{{--            width: 100%;--}}
{{--            padding: 10px;--}}
{{--            border-radius: 5px;--}}
{{--            border: 1px solid #ccc;--}}
{{--        }--}}
{{--        .btn {--}}
{{--            background-color: #007bff;--}}
{{--            color: #fff;--}}
{{--            padding: 10px 20px;--}}
{{--            text-decoration: none;--}}
{{--            border-radius: 5px;--}}
{{--            display: inline-block;--}}
{{--            border: none;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--        .btn:hover {--}}
{{--            background-color: #0056b3;--}}
{{--        }--}}
{{--        .rating {--}}
{{--            display: flex;--}}
{{--        }--}}
{{--        .rating input {--}}
{{--            display: none;--}}
{{--        }--}}
{{--        .rating label {--}}
{{--            font-size: 2em;--}}
{{--            color: #ccc;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--        .rating input:checked ~ label {--}}
{{--            color: #f90;--}}
{{--        }--}}
{{--        .rating input:checked + label:hover,--}}
{{--        .rating input:checked ~ label:hover,--}}
{{--        .rating label:hover ~ input:checked ~ label {--}}
{{--            color: #fc0;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="header">Rate Our Reservation Services</div>--}}
{{--    <form method="POST" action="{{ route('rate.service') }}">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="user_id" value="{{ $user->id }}">--}}
{{--        <div class="form-group">--}}
{{--            <label for="rating">Rating:</label>--}}
{{--            <div class="rating">--}}
{{--                <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars">★</label>--}}
{{--                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">★</label>--}}
{{--                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">★</label>--}}
{{--                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">★</label>--}}
{{--                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">★</label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="comments">Comments:</label>--}}
{{--            <textarea name="comments" id="comments" rows="4"></textarea>--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn">Submit</button>--}}
{{--           --}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
