#!/bin/bash

# http://francis-besset.com/git-subtree-with-tags.html

git fetch origin

git checkout -B subtree_master origin/master

# iterate over components
for repoName in `ls -1 src/Beloop/Component` ; do
    # use subtree to split library into new branch
    git subtree split --prefix=src/Beloop/Component/$repoName -b subtree_${repoName}_master

    # add remote identified by $repoName
    git remote add $repoName git@github.com:beloop/$repoName.git

    # push local branch on remote
    git push $repoName subtree_${repoName}_master:master
done

# iterate over bundles
for repoName in `ls -1 src/Beloop/Bundle` ; do
    # use subtree to split library into new branch
    git subtree split --prefix=src/Beloop/Bundle/$repoName -b subtree_${repoName}_master

    # add remote identified by $repoName
    git remote add $repoName git@github.com:beloop/$repoName.git

    # push local branch on remote
    git push $repoName subtree_${repoName}_master:master
done