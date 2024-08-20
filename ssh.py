import socket
import ipaddress
 
ssh_to_find = 1
ssh_found = 0
all_computer_in_classroom = 18
addres = "20.20.20.100"
address = str(ipaddress.IPv4Address(addres))

#for i in range(all_computer_in_classroom):
while(ssh_found != ssh_to_find):
    for i in range(all_computer_in_classroom):
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        #address = "192.168.1." + str(i)
        address = str(ipaddress.IPv4Address(addres) + i)
        result = s.connect_ex((address, 22))
        print(ssh_found)
        if result == 0:
            print(address, "is up")
        else:
            print(address, "is down")
        if(bool(result) == False):
            ssh_found += 1

        if(ssh_to_find != ssh_found and address == str(ipaddress.IPv4Address(addres) + all_computer_in_classroom - 1)):
            address = "20.20.20.100"
            address = str(ipaddress.IPv4Address(addres))
            ssh_found = 0
        elif(ssh_found == ssh_to_find):
            break

        s.close()
