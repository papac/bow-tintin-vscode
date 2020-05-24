#extends("layout")

#block("title", "The page title")

#block("content")

	#if(true)
		// Do Something
	#endif

	#loop($users as $user)
		{{ $user->name }}
	#endloop

	{# comment #}
	#if (true)
		// Do Something
	#endif

	#white(true)
		// Do Somethink
	#endwhile

	#for($i = 0; $i < 0; $i++)
		// Do Somethink
	#endfor

	#unless(false)
		// Do Somethink
	#endunless
#endblock