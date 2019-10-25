# Data Resource BD
Provide financial data to the investment professionals and academicians

## Inspiration
Following sites are about 40% similar to what we are trying to build.

1. [Lanka Bangla Financial Portal] (https://lankabd.com/)
2. [Financial Modelling Prep] (https://financialmodellingprep.com/developer/docs/#Company-Financial-Statements)
3. [Stockrow] (https://stockrow.com/AAPL/financials/income/quarterly)

## Features for Everyone
- Sign In/Sign Up: Full name, contact number, email id, Individual- profession and isntitution/ institituion of organization
- Search
- Logo, Tagline
- Menu with Sub Menu: Macro (Monthly Macro Update, Yearly Macro Update, Bank Wise Interest Rate Spread, Mobile Usage Data, Weekly Macro Update, Electricity Data, Demographic Data), Commodity, Company, Market, Research
- Survey
- Landing Page: Header Image, Who Are We, Why Choose Us, Our Clients, Survey Results, Footer, Signup
- Research Portal (Company, Ticker, Report Type, Conducting Company, Analyst, File) : Not visible now will be visible later
- Monthly Macro (Particular, Date, Excel) 
- Financial Statement (Filter: Company, Sector), Filter(Anually, Quarterly: Quarter 1, Quarter 2, Quarter 3, Quarter 4): Company, Ticker, Sector, Year, PDF, Excel
- Payment Gateway

## Features for Admin
- Add/Edit/Delete User (Name, Email ID, Password, Confirm Password, User Type: Admin, User)
- Publish Announcement or Survey (Question, Answer list), Survey Result 
- Add/Edit/Delete Menu & Sub Menu
- Add/Edit/Delete Page: Title, Description, Menu
- Page: Add/Edit/Delete: Particular, Excel, PDF (Upload), Download Count, Show Title & Description (if provided)
- Company List: Add/Edit/Delete: Name, Ticker, Sector
- Add/Edit/Delete Financial Statement: Company, Year, Annual (1 excel, 5 PDF), Q1-Q4 (1 excel, 1 pdf)

## Developement Plan
1. User Management (Visitor, Paid, Admin) (Data: Full name, contact number, email id, Individual- profession and institution/ institituion of organization[!!!]) (Name, Email ID, Password, Confirm Password, User Type: Admin, User)
2. Menu, Sub-Menu Management Macro (Monthly Macro Update, Yearly Macro Update, Bank Wise Interest Rate Spread, Mobile Usage Data, Weekly Macro Update, Electricity Data, Demographic Data), Commodity, Market
3. Page Management (Particular, Date, Excel) (Particular, Excel, PDF (Upload), Download Count, Show Title & Description (if provided))
4. Company Management (Name, Ticker, Sector)
5. Financial Statement Management(Company, Year, Annual (1 excel, 5 PDF), Q1-Q4 (1 excel, 1 pdf))
6. Announcement
7. Survey & Survey Result  (Question, Answer list)
8. Payment Management
9. Static Content Managment (Logo, Tagline, Header Image, Who Are We, Why Choose Us, Our Clients, Footer)
10. Search
11. Research (Skipped for now)

## Models
1. User: full_name, contact_number, email, profession, institution, type:visitor|paid|admin, expires_at (user type changes to visitor on this date)
2. Menu: parent_menu, title
3. Page: title, menu_id, description(nullable), slug(unique)
4. PageItem: particular(one line description text), excel_file_url, pdf_file_url, excel_file_url_download_count, pdf_file_url_download_count
5. Company: name, ticker, sector_id[!!!]
6. Announcment: text, is_published
8. Survey: title, description, survey_question_id, is_published, is_accepting_answer
9. SurveyQuestion: survey_id, question
10. SurveyAnswerOption: survey_question_id, answer_option, hit_count
11. SurveyHit: user_id, survey_answer_option_id 
12. Transaction: user_id, amount, subscription_plan_id, subscription_starts_at, subscription_ends_at, (any other information from payment gateway)
13. StaticContent: key, value
14. FinanceInfo: company_id, year, annual_excel_url, annual_pdf_1_url, annual_pdf_2_url, annual_pdf_3_url, annual_pdf_4_url, annual_pdf_5_url, q1__pdf_url, q1_excel_url, q2__pdf_url, q2_excel_url, q3__pdf_url, q3_excel_url, q4__pdf_url, q4_excel_url, annual_excel_download_count, annual_pdf_1_download_count, annual_pdf_2_download_count, annual_pdf_3_download_count, annual_pdf_4_download_count, annual_pdf_5_download_count, q1__pdf_download_count, q1_excel_download_count, q2__pdf_download_count, q2_excel_download_count, q3__pdf_download_count, q3_excel_download_count, q4__pdf_download_count, q4_excel_download_count
15. Search: user_id, search_term
16. Sector: name
17. SubscriptionPlan: name, price, duration_in_days, is_visible