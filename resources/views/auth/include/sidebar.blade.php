 <ul>
     <li>
         <a href="{{ route('dashboard') }}">Dashboard</a>
     </li>

     <li>
         <a href="{{ route('user.profile') }}">Profile</a>
     </li>

     <li>
         @if (Auth::user()->role == '2')
             <a href="#">Complains</a>
     </li>
     @endif
     <li>
         <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button class="btn btn-danger">Logout</button>
         </form>
     </li>
 </ul>
