# start the script with python3.11 start.py on virtual environment for more python.txt

import os
import sys
import time
import subprocess
# import threading


appfile ="./aipy.py"
appfile2 = "./aipy2.py"
appfile3 = "./aipy3.py"


def main():

    # while True:
        
        # i = 0
        
        print("Starting AI python project")
        
        subprocess.Popen([sys.executable, appfile])
        print("First app started")
        # if i == 0:
            # i += 1
        subprocess.Popen([sys.executable, appfile2])
        print("Second app started")
        subprocess.Popen([sys.executable, appfile3])
        print("Third app started")
        # time.sleep()#wait 5 seconds
        # import sys, subprocess
        # subprocess.run([sys.executable, ".py"])

        #create threads
        # t1=threading.Thread(target=)
        # t2=threading.Thread(target=)
    
    
        # #start thread 1
        # t1.start()
        # #start thread 2
        # t2.start()
        # #wait until thread 1 is completely executed
    
        # t1.join()
        # #wait until thread 2 is completely executed
    
        # t2.join()
        # #both threads completely executed
        # print("Completed!")
    
    

if __name__ == '__main__':
    main()