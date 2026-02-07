## OVERVIEW
PHP application that processes an individual employee's weekly payroll for Tiny Co.
The program will **prompt** for the employee's details:
- name
- hourly wage
- hours worked
- withholding exemptions
- marital status
- previos year-to-date earnings
and then compute and display the payroll results for the current week
    
## PERFORMANCE OBJECTIVE
At the of this activity, students should be able to:
- [x] 1. Create a PHP script and save in a prescribed location
- [x] 2. Appy proper naming conventions for PHP files and projects folders.
- [x] 3. Identify the required inputs and map them to variables/constants
- [x] 4. Validate and convert user input into appropriate types using PHP functions such as `intval()`, `floatval()`, or filter-based validation.
- [x] 5. Implement the required payroll computations.
- [x] 6. Format outputs (e.g. currency with thousands separators) for a clear, professional result displayed in the browser or console using PHP's formatting functions. 
- [ ] 7. Test and debug the application using the provided sample employee data and capture screenshots as evidence of completion. 

### Table 1: Employee Data
| Name       | Houry Wage | Hours Worked | Exemptions | Martial Status | Year to date earning |
| ---------- | ---------- | ------------ | ---------- | -------------- | -------------------- |
| Aj Clark   | 45.50      | 38           | 4          | Married        | 88,600.00            |
| Ann Miller | 44.00      | 35           | 3          | Married        | 68,200.00            |
| John Smith | 17.95      | 50           | 1          | Single         | 30,604.75            |
| Sue Taylor | 25.50      | 43           | 2          | Single         | 36,295.50            |


### Table 2: Payroll Information (Sample Output)
| Name       | Current Earning | Yr. to Date Earnings | FICA Taxes | Income Tax Wh. | Check Amount |
| ---------- | --------------- | -------------------- | ---------- | -------------- | ------------ |
| Aj Clark   | 1,729.00        | 90,329.00            | 111.87     | 206.26         | 1,410.87     |
| Ann Miller | 1540.00         | 69,740.00            | 117.81     | 174.40         | 1,247.79     |

The items in Table 2 should be calculated as follows:
- **Current Earnings**: `hourlyWage` * `hourstWorked` (with time-and-a-half after 40 hours)
- **Year-to-Date Earnings**: previous yeat-to-date earnings plus current earnings
- **FICA Taxes**: sum of 6.2 percent of first 90,000 of earnings(Social Security benefits tax) and 1.45% of total wages(Medicare Tax)
- **Federal Income Tax Withheald**: substract 61.54 from the current earnings for each withholding exemption and use Table 3 or Table 4, depending on marital status
- **Check Amount**: [current earnings] - [FICA taxes] - [income tax withheld]


### Table 3: Federal income tax withheld for a single person paid weekly.

| Adjusted Weekly Income | Income Tax Withheld                 |
| ---------------------- | ----------------------------------- |
| 0 to 51                | 0                                   |
| Over 51 to 188         | 10% of amout over 51                |
| Over 188 to 606        | 13.70 + 15% of amount over 188      |
| Over 606 to 1,341      | 76.40 + 25% of amount over 606      |
| Over 1,341 to 2,922    | 260.15 + 28% of amount over 1,341   |
| Over 2,922 to 6,313    | 702.83 + 33% of amount over 2,922   |
| Over 6,313             | 1,821.86 + 35% of amount over 6,313 |


### Table 4: Federal income tax withheld for a married person paid weekly.
| Adjusted Weekly Income | Income Tax Withheld                 |
| ---------------------- | ----------------------------------- |
| 0 to 154               | 0                                   |
| Over 154 to 435        | 10% of amout over 154               |
| Over 435 to 1,273      | 28.10 + 15% of amount over 435      |
| Over 1,273 to 2,322    | 153.80 + 25% of amount over 1,273   |
| Over 2,322 to 3,646    | 416.05 + 28% of amount over 2,322   |
| Over 3,646 to 6,409    | 786.77 + 33% of amount over 3,646   |
| Over 6,409             | 1,698.56 + 35% of amount over 6,409 |
    
