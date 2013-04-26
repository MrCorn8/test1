"""
A restaurant recommendation system.

Here are some example dictionaries.  These correspond to the information in
restaurants_small.txt.

Restaurant name to rating:
# dict of {str: int}
{'Georgie Porgie': 87,
 'Queen St. Cafe': 82,
 'Dumplings R Us': 71,
 'Mexican Grill': 85,
 'Deep Fried Everything': 52}

Price to list of restaurant names:
# dict of {str, list of str}
{'$': ['Queen St. Cafe', 'Dumplings R Us', 'Deep Fried Everything'],
 '$$': ['Mexican Grill'],
 '$$$': ['Georgie Porgie'],
 '$$$$': []}

Cuisine to list of restaurant names:
# dict of {str, list of str}
{'Canadian': ['Georgie Porgie'],
 'Pub Food': ['Georgie Porgie', 'Deep Fried Everything'],
 'Malaysian': ['Queen St. Cafe'],
 'Thai': ['Queen St. Cafe'],
 'Chinese': ['Dumplings R Us'],
 'Mexican': ['Mexican Grill']}

With this data, for a price of '$' and cuisines of ['Chinese', 'Thai'], we
would produce this list:

    [[82, 'Queen St. Cafe'], [71, 'Dumplings R Us']]
"""

# The file containing the restaurant data.
#FILENAME = 'restaurants_small.txt'
FILENAME = 'lecture_code_w1_restaurants.txt'


def recommend(file, price, cuisines_list):
    """(file open for reading, str, list of str) -> list of [int, str] list

    Find restaurants in file that are priced according to price and that are
    tagged with any of the items in cuisines_list.  Return a list of lists of
    the form [rating%, restaurant name], sorted by rating%.
    """

    # Read the file and build the data structures.
    # - a dict of {restaurant name: rating%}
    # - a dict of {price: list of restaurant names}
    # - a dict of {cusine: list of restaurant names}
    name_to_rating, price_to_names, cuisine_to_names = read_restaurants(file)


    # Look for price or cuisines first?
    # Price: look up the list of restaurant names for the requested price.
    names_matching_price = price_to_names[price]

    # Now we have a list of restaurants in the right price range.
    # Need a new list of restaurants that serve one of the cuisines.
    names_final = filter_by_cuisine(names_matching_price, cuisine_to_names, cuisines_list)

    # Now we have a list of restaurants that are in the right price range and serve the requested cuisine.
    # Need to look at ratings and sort this list.
    result = build_rating_list(name_to_rating, names_final)

    # We're done!  Return that sorted list.
    return result

def build_rating_list(name_to_rating, names_final):
    """ (dict of {str: int}, list of str) -> list of list of [int, str]

    Return a list of [rating%, restaurant name], sorted by rating%

    >>> name_to_rating = {'Georgie Porgie': 87,
     'Queen St. Cafe': 82,
     'Dumplings R Us': 71,
     'Mexican Grill': 85,
     'Deep Fried Everything': 52}
    >>> names = ['Queen St. Cafe', 'Dumplings R Us']
    [[82, 'Queen St. Cafe'], [71, 'Dumplings R Us']]
    """
    #Look for the name and write it to the list with the rate (first the rate)
    final_list=[]
    for i in names_final:
        final_list.append([name_to_rating[i],i])

    final_list.sort()
    return final_list

def filter_by_cuisine(names_matching_price, cuisine_to_names, cuisines_list):
    """ (list of str, dict of {str: list of str}, list of str) -> list of str

    >>> names = ['Queen St. Cafe', 'Dumplings R Us', 'Deep Fried Everything']
    >>> cuis = 'Canadian': ['Georgie Porgie'],
     'Pub Food': ['Georgie Porgie', 'Deep Fried Everything'],
     'Malaysian': ['Queen St. Cafe'],
     'Thai': ['Queen St. Cafe'],
     'Chinese': ['Dumplings R Us'],
     'Mexican': ['Mexican Grill']}
    >>> cuisines = ['Chinese', 'Thai']
    >>> filter_by_cuisine(names, cuis, cuisines)
    ['Queen St. Cafe', 'Dumplings R Us']
    """
    #store names that have the cuisines provided
    possible_names=[]
    for i in cuisines_list:
        if i in cuisine_to_names:
            for j in cuisine_to_names[i]:
                possible_names.append(j)

    #match the names that match price with the names that serve the cuisines provided
    final_names=[]
    for i in possible_names:
         if i in names_matching_price:
             final_names.append(i)

    return final_names


def read_restaurants(file):
    """ (file) -> (dict, dict, dict)

    Return a tuple of three dictionaries based on the information in the file:

    - a dict of {restaurant name: rating%}
    - a dict of {price: list of restaurant names}
    - a dict of {cusine: list of restaurant names}
    """
    file_opened=open(file, 'r')

    lines=file_opened.readlines()
    file_opened.close()
	
    counter = 0
    name_to_rating = {}
    price_to_names = {'$': [], '$$': [], '$$$': [], '$$$$': []}
    cuisine_to_names = {}

    while counter<len(lines):
        name_to_rating[lines[counter].strip()]=int(lines[counter+1][:2])
        price_to_names[lines[counter+2].strip()].append(lines[counter].strip())

        cuisine_list=lines[counter+3].strip().split(',')
        for cuisine in cuisine_list:
            if cuisine not in cuisine_to_names:
                cuisine_to_names[cuisine]=[]
            cuisine_to_names[cuisine].append(lines[counter].strip())
        counter=counter+5

#    print(name_to_rating,end="\n\n")
#    print(price_to_names,end="\n\n")
#    print(cuisine_to_names,end="\n\n")

    return name_to_rating, price_to_names, cuisine_to_names

#P R U E B A S 
#read_restaurants(FILENAME)
#name_to_rating, price_to_names, cuisine_to_names = read_restaurants(FILENAME)
#    print(name_to_rating,end="\n\n")
#    print(price_to_names,end="\n\n")
#    print(cuisine_to_names,end="\n\n")
#names_matching_price = price_to_names['$']
#result=filter_by_cuisine(names_matching_price, cuisine_to_names, ['Chinese', 'Thai'])
#final=build_rating_list(name_to_rating, result)
#print(final)

print(recommend(FILENAME, '$$', ["Mexican","Thai","Italian","Japanese"]))
