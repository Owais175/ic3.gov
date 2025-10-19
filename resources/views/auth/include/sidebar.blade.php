 <ul>
     <li>
         <a href="{{ route('dashboard') }}">Dashboard</a>
     </li>

     <li>
         <a href="{{ route('user.profile') }}">Profile</a>
     </li>
     @if (Auth::user()->role == '1')
         <li>
             <a href="{{ route('admin.contact') }}">User Contacts</a>
         </li>
     @endif
     <li>
         <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button class="btn btn-danger">Logout</button>
         </form>
     </li>
 </ul>
