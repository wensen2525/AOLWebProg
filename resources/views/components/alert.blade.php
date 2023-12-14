
@if(session('error'))
      <script>alert('{{ session()->get('error') }}')</script>
@endif
@if(session('failed'))
      <script>alert('{{ session()->get('failed') }}')</script>
@endif
@if(session('success'))
      <script>alert('{{ session()->get('success') }}')</script>
@endif
@if(session('email_double'))
      <script>alert('{{ session()->get('email_double') }}')</script>
@endif