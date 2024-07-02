<!DOCTYPE html>
<html>
<head>
    <title>Rate Our Services</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        Rate Our Services
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('rate.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="rating">Your Rating:</label>
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="rating" value="{{ $i }}" {{ $rating == $i ? 'checked' : '' }}> ★
                    </label>
                @endfor
            </div>
        </div>
        <div class="form-group">
            <label for="comments">Additional Comments:</label>
            <textarea name="comments" id="comments" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Submit Rating</button>
        </div>
    </form>
</div>
</body>
</html>
