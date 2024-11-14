# Workflow typique Git

## 1. Forker le repo
Un collaborateur (disons Christiane) fork le dépôt origin sur son propre compte Github. Cela crée une copie personnelle du repo.
## 2. Cloner le fork
Christiane clone son fork sur sa machine locale:
```bash
git clone https://github.com/sossoukpechritiane/projet-x.git
cd projet-x
```
## 3. Configurer les remotes
Christiane configure le repo original comme remote pour son garder son fork à jour:
```bash
git remote add base https://github.com/tiburcekouagou/projet-x.git
```

## 4. Créer une branche pour la fonctionnalité
Avant d'apporter des modifications, elle crée une nouvelle branche pour sa fonctionnalité
```bash
git checkout -b nouvelle-fonctionnalité
```

## 5. Apporter des modifications
Christiane effectue les modifications nécessaires dans le code et les valides:
```bash
git add .
git commit -m "Ajout de la nouvelle fonctionnalité"
```

## 6. Pousser les modifications
Elle pousse sa branche vers son fork
```bash
git push origin nouvelle-fonctionnalité
```

## 7. Soumettre un pull request
Christiane se rend sur Github et soumet un PR de sa branche vers la branche principale du repo "upstream".

## 8. Révision du PR
Les mainteneurs du repo original examinent le PR. Ils peuvent poser des questions ou demander des modifications.

## 9. Gestion des conflits
si des conflits sont détectés (par exemple, d'autres contributions ont été fusionnées dans la branche principale), Christiane doit:
1. Mettre à jour son fork:
````bash
git fetch base
git checkout main
git merge base/main
```

2. Retourner à sa branche:
```bash
git checkout nouvelle-fonctionnalité
```

3. Fusionner les modifications:
```bash
git merge main
```

4. Résoudre les conflits dans les fichiers, puis les valider:
```bash
git add .
git commit -m "Résolution des conflits"
```