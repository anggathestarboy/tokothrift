<x-home.navbar />
<br><br>



<!-- Tambahkan Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>


<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="w-[60%] bg-white rounded-2xl shadow-xl p-8"  style="width: 70vh; margin-top: 100px; margin-bottom: 100px;">

    <h2 class="text-2xl font-black tracking-wider text-center">Register</h2>
    <br>
    <!-- Notifikasi Success -->
@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show" 
        x-transition 
        class="mb-4 p-3 rounded-lg text-sm text-green-800 bg-green-100 border border-green-300"
    style="background-color: rgb(72, 179, 11); color:white; padding: 15px">
        {{ session('success') }}
    </div>
@endif

<!-- Notifikasi Error -->
@if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show" 
        x-transition 
        class="mb-4 p-3 rounded-lg text-sm text-red-800 bg-red-100 border border-red-300"
    >
        {{ session('error') }}
    </div>
@endif
    <form action="{{ route('auth.register.submit') }}" method="POST" class="space-y-5">
        @csrf
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="user_username" required
          class="mt-1 block w-full rounded-lg border-black shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray">
      </div>
      <br>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="user_password" required
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray">
      </div>
<br>
      <!-- Fullname -->
      <div>
        <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="fullname" name="user_fullname" required
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray">
      </div>
      <br>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="user_email" required
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray">
      </div><br>

      <!-- No HP -->
      <div>
        <label for="nohp" class="block text-sm font-medium text-gray-700">No HP</label>
        <input type="text" id="nohp" name="user_nohp" maxlength="13" required
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray">
      </div><br>

      <!-- Alamat -->
      <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea id="alamat" name="user_alamat" rows="3" required
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-400 p-2" style="border: 1px solid gray"></textarea>
      </div>
<br>
      <!-- Submit -->
      <div>
        <button type="submit"
          class="w-full bg-black text-white  py-2.5 rounded-lg shadow-lg hover:bg-gray-800 hover:shadow-xl transition duration-300" style="height: 40px">
          Register
        </button>
      </div>
<br>
       <p class="text-center">sudah punya akun? <strong><a href="/login">login</a></strong></p>
    </form>

   
  </div>
</div>

<x-home.footer />
