   M S B A M L   `   `   `  ����F  Bstonkspizza, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null)clr-namespace:stonkspizzastonkspizza  5   	       stonkspizza.login   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   +localclr-namespace:stonkspizza     5   	     � Title$  login��5   	   $	��450��6   $	��350��6$    � 
ResizeMode$ NoResize=�5	   	    � ShowInTaskbar .   � Topmost . 
������ .��5      � ���#393939 � RowDefinitions 5   
   �� 5      $��* �6   �� 5      $��2* �6   �� 5      $��8* �6   �� 5      $��* �6    � ColumnDefinitions 5   
   �� 5      $��* �6   �� 5      $	��30* �6   �� 5      $��* �6   .+�5   
   �� $��1��6   $��1��6    ��5      �� 5       �� 	UriSource$ Assets/login.png?�6   5      �� 5   
   $��0,0,0,10q�6   $��1��6'   $��2��67   $��Bottom=�6D   $	��184��6_   .+�5      �� ���#30D0FF$��22��6-   $��5,0,0,0q�69   $��14(�6J   �� 6Z   $�Gebrukersnaam��6^   6v   �� 5      -   5         ��Name$ tbnaam��5      $��0q�6'   $��20��6;   ���#C4F2FF$��5,0,0,0q�6]   �� 5       ���#30D0FF$��5,0,0,0q�6-   $��14(�6>   �� 6M   $�
Wachtwoord��6Q   6f   �� 5!      -   5        $ tbwachtwoord��5!      $��0q�6,   $��20��6@   $��5,2,0,0 q�6M   ���#C4F2FF
�������6u   �� 5"      -   5         ��Name$ 	tbmessage��5"      ���	#FF0080F0$��57��6B   $�� ��6N   $��0,10,0,0q�6V   $��Center=�6h   $	��300��6�   �� 5#      -   5        	 ��Name$	 btnlogin��5#      $��30��6'   $	��100��63   $��
Aanmelden ��6@   ���#00B6EB
�������
�������
 J� RenderTransformOrigin$
 
0.49,1.267&�6�   $��0,4,0,0q�6�    � 	Resources 5$       �� 
TargetType �� Property �� Value��%^   '��       �� 5%      " ��6   .�5&      ��  �@��CornerRadius$ 8��69   5'      5(      5)      5*      5/      52      