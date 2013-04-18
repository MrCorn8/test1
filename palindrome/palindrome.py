def is_palindrome_v1(s):
	"""
	(str) -> Bool
	Return True if and only if s is palindrome.

	>>> is_palindrome_v1('noon')
	True
	>>> is_palindrome_v1('racecar')
	True
	>>> is_palindrome_v1('dented')
	False
	"""
	return reverse(s) == s

def is_palindrome_v2(s):
	"""
	(str) -> Bool
	Return True if and only if s is palindrome.

	>>> is_palindrome_v2('noon')
	True
	>>> is_palindrome_v2('racecar')
	True
	>>> is_palindrome_v2('dented')
	False
	"""
	#The number of characters in s
	ls=len(s)

	#Compare the firs half of s to the reversed of the second half.
	#Omit the middle char of an odd-length string.

	return s[:ls//2] == reverse(s[ls - ls//2:])

def is_palindrome_v3(s):
	"""
	(str) -> Bool
	Return True if and only if s is palindrome.

	>>> is_palindrome_v3('noon')
	True
	>>> is_palindrome_v3('racecar')
	True
	>>> is_palindrome_v3('dented')
	False
	"""
	i=0
	j=len(s)-1

	while i<j and s[i] == s[j]:
		i=i+1
		j=j-1
	
	return j<=i

def reverse(s):
	"""
	(str) -> str
	Return a reversed version of s.
	>>> reverse('hello')
	'olleh'
	>>> reverse('a')
	'a'
	"""
	rev=''
	#For each char in s, add that char to the beginning of rev.
	for char in s:
		rev=char + rev
	
	return rev

#TEST
print is_palindrome_v3('noon')
print is_palindrome_v3('racecar')
print is_palindrome_v3('dented')
