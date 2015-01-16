Explanation of the "solution.php" code:

At first the two csv files, 'awards.csv' and 'contracts.csv' are opened. Then the contents are kept in an array $awards[] and $contracts[]. So now, $awards[0] is the first line in awards.csv, $awards[1] is the second line in awards.csv, and so on. Similar is done with the $contracts[] array.

Secondly, the first word in every array is compared, $awards[x][0] and $contracts[x][0]. The first if, if($x==0), is to make the header. Then, the first word 'contractname' is deleted using unset function and $awards[0] and $contracts[0] are joined using 'array_merge' function.
Then, using those, the first word in every line is selected from $contracts array and compared with the first word from every line from $awards array. So, if($awards[$y][0] == $contracts[$x][0]), it is checked if those first words are the same (eg. for Contract-2070-3). If they are the same, it is deleted and those lines are merged. If the words are not the same, the $contracts[x] line is saved in $line array and continued.
Finally, the content is saved from $line array in the file.

To determine the total amount of current contracts, I've at first stored the rows in an array, then used the nested while loops and if conditions that determines whether or not the status is 'Current'. If so, then again all the amount values are stored in a separate array. The values of those array are added using 'array_sum()' function. And finally, we get the output of 600000 amount in our case, and it is printed on the screen.
