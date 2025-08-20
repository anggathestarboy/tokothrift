<x-home.navbar />
<br><br>
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="w-[60%] bg-white rounded-2xl shadow-xl p-8"  style="width: 450px">
    <h2 class="text-2xl font-black tracking-wider text-center">Login</h2>
    <br><br>
    
    <form action="{{ route('auth.login.submit') }}" method="POST" class="space-y-5">
        @csrf
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="user_email" required
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

      <!-- Submit -->
      <div>
        <button type="submit"
          class="w-full bg-black text-white  py-2.5 rounded-lg shadow-lg hover:bg-gray-800 hover:shadow-xl transition duration-300" style="height: 40px">
          Login
        </button>
      </div>
      <br>
      @if (session('error'))
    <div>
        {{ session('error') }}
 
    </div>
@endif
   
      <p class="text-center">belum punya akun? <strong><a href="/register">Register</a></strong></p>
    </form>
  </div>
</div>

<x-home.footer />
