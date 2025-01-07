#include "pch.h"
#include "Converters.h"
//Testing
;
	String^ working(String^ testing) {
		String^ trying = testing;
		return trying;
	}

//Converting string to String^
	String^ convert_to_big_string(string unconverted_string) {
		String^ return_big_string = gcnew System::String(unconverted_string.c_str());
		return return_big_string;
	}
//Converting String^ to string
	string convert_to_small_string(String^ unconverted_string) {
		System::IntPtr pointer = Marshal::StringToHGlobalAnsi(unconverted_string);
		char* charPointer = reinterpret_cast<char*>(pointer.ToPointer());
		std::string return_small_string(charPointer, unconverted_string->Length);
		Marshal::FreeHGlobal(pointer);
		return return_small_string;
	}

//Converting dd/mm/yyyy to yyyy-mm-dd

	String^ convert_date(String^ String_date_to_convert) {
		string string_date_converted = convert_to_small_string(String_date_to_convert);

		string dd, mm, yyyy;

		dd[0] = string_date_converted[0];
		dd[1] = string_date_converted[1];

		mm[0] = string_date_converted[3];
		mm[1] = string_date_converted[4];

		yyyy[0] = string_date_converted[6];
		yyyy[1] = string_date_converted[7];
		yyyy[2] = string_date_converted[8];
		yyyy[3] = string_date_converted[9];

		String^ DD = convert_to_big_string(dd);
		String^ MM = convert_to_big_string(mm);
		String^ YYYY = convert_to_big_string(yyyy);
		String^ converted_date = YYYY + "-" + MM + "-" + DD;
		
		return converted_date;
	}