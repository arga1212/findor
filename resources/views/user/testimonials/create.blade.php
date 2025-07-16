<form action="{{ route('testimonials.store', $boardingHouse->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Tambahkan error message -->
    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Rating -->
    <div class="form-group mb-4">
        <label for="rating" class="form-label">Rating</label>
        <div class="rating-input">
            @for($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
                       {{ old('rating') == $i ? 'checked' : '' }} required>
                <label for="star{{ $i }}" class="star-label">
                    <i class="fas fa-star"></i>
                </label>
            @endfor
        </div>
        @error('rating')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Content -->
    <div class="form-group mb-4">
        <label for="content" class="form-label">Testimoni</label>
        <textarea name="content" id="content" rows="5" class="form-control" 
                  placeholder="Bagikan pengalaman Anda..." required>{{ old('content') }}</textarea>
        @error('content')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Photo (Opsional) -->
    <div class="form-group mb-4">
        <label for="photo" class="form-label">Upload Foto (Opsional)</label>
        <input type="file" name="photo" id="photo" class="form-control">
        @error('photo')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Kirim Testimoni
        </button>
        <a href="{{ route('boarding-houses.show', $boardingHouse->slug) }}" 
           class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</form>

<style>
    /* Testimonial Form Styles */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

/* Star Rating Styles */
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 0.25rem;
}

.rating-input input[type="radio"] {
    display: none;
}

.rating-input .star-label {
    font-size: 1.5rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}

.rating-input input[type="radio"]:checked ~ .star-label,
.rating-input input[type="radio"]:hover ~ .star-label,
.rating-input .star-label:hover,
.rating-input .star-label:hover ~ .star-label {
    color: #ffc107;
}

.rating-input input[type="radio"]:checked + .star-label {
    color: #ffc107;
}

/* Button Styles */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    font-weight: 500;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border: 1px solid #0d6efd;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0a58ca;
}

.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border: 1px solid #6c757d;
}

.btn-secondary:hover {
    background-color: #5c636a;
    border-color: #565e64;
}

/* Alert Styles */
.alert {
    padding: 1rem;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
}

.alert-danger {
    color: #842029;
    background-color: #f8d7da;
    border: 1px solid #f5c2c7;
}

/* Error Message Styles */
.text-danger {
    color: #dc3545;
}

.small {
    font-size: 0.875rem;
}

/* Responsive Adjustments */
@media (max-width: 576px) {
    .rating-input .star-label {
        font-size: 1.25rem;
    }
    
    .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }
}
</style>